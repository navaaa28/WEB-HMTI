<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

class FileUploadService
{
    private $disk;
    private $maxFileSize;
    private $allowedMimeTypes;
    private $uploadProgressKey;

    public function __construct()
    {
        $this->disk = config('filesystems.default');
        $this->maxFileSize = 10 * 1024 * 1024; // 10MB
        $this->allowedMimeTypes = [
            'image/jpeg',
            'image/png',
            'image/gif',
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ];
    }

    /**
     * Mulai proses upload file
     */
    public function startUpload(string $fileName, int $totalSize)
    {
        $uploadId = Str::uuid();
        $this->uploadProgressKey = "upload_progress:{$uploadId}";

        Cache::put($this->uploadProgressKey, [
            'fileName' => $fileName,
            'totalSize' => $totalSize,
            'uploadedSize' => 0,
            'status' => 'uploading',
            'startedAt' => now(),
            'lastActivity' => now(),
        ], now()->addHours(1));

        return [
            'uploadId' => $uploadId,
            'chunkSize' => 1024 * 1024, // 1MB chunks
        ];
    }

    /**
     * Proses chunk upload
     */
    public function processChunk(string $uploadId, UploadedFile $chunk, int $chunkIndex)
    {
        try {
            $this->uploadProgressKey = "upload_progress:{$uploadId}";
            $progress = Cache::get($this->uploadProgressKey);

            if (!$progress) {
                throw new \Exception('Upload session not found or expired');
            }

            // Validasi chunk
            $this->validateChunk($chunk);

            // Update progress
            $progress['uploadedSize'] += $chunk->getSize();
            $progress['lastActivity'] = now();
            Cache::put($this->uploadProgressKey, $progress, now()->addHours(1));

            // Simpan chunk sementara
            $tempPath = "temp/{$uploadId}/chunk_{$chunkIndex}";
            Storage::disk($this->disk)->put($tempPath, file_get_contents($chunk));

            // Jika ini chunk terakhir, gabungkan semua chunk
            if ($progress['uploadedSize'] >= $progress['totalSize']) {
                return $this->finalizeUpload($uploadId);
            }

            return [
                'success' => true,
                'progress' => ($progress['uploadedSize'] / $progress['totalSize']) * 100,
                'message' => 'Chunk uploaded successfully'
            ];

        } catch (\Exception $e) {
            Log::error('File upload error', [
                'uploadId' => $uploadId,
                'chunkIndex' => $chunkIndex,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            $this->cleanupFailedUpload($uploadId);

            return [
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Finalisasi upload dan proses file
     */
    private function finalizeUpload(string $uploadId)
    {
        try {
            $progress = Cache::get($this->uploadProgressKey);
            if (!$progress) {
                throw new \Exception('Upload session not found');
            }

            // Generate nama file yang aman
            $safeFileName = $this->generateSafeFileName($progress['fileName']);
            
            // Gabungkan semua chunk
            $finalPath = $this->combineChunks($uploadId, $safeFileName);

            // Enkripsi file
            $this->encryptFile($finalPath);

            // Generate signed URL
            $signedUrl = $this->generateSignedUrl($finalPath);

            // Update progress
            $progress['status'] = 'completed';
            $progress['finalPath'] = $finalPath;
            $progress['signedUrl'] = $signedUrl;
            Cache::put($this->uploadProgressKey, $progress, now()->addHours(1));

            // Cleanup temporary files
            $this->cleanupTempFiles($uploadId);

            return [
                'success' => true,
                'progress' => 100,
                'message' => 'Upload completed successfully',
                'filePath' => $finalPath,
                'signedUrl' => $signedUrl
            ];

        } catch (\Exception $e) {
            Log::error('File upload finalization error', [
                'uploadId' => $uploadId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            $this->cleanupFailedUpload($uploadId);

            return [
                'success' => false,
                'message' => 'Upload finalization failed: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Validasi chunk file
     */
    private function validateChunk(UploadedFile $chunk)
    {
        if ($chunk->getSize() > $this->maxFileSize) {
            throw new \Exception('File size exceeds maximum limit');
        }

        if (!in_array($chunk->getMimeType(), $this->allowedMimeTypes)) {
            throw new \Exception('File type not allowed');
        }
    }

    /**
     * Generate nama file yang aman
     */
    private function generateSafeFileName(string $originalName): string
    {
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $randomName = Str::random(32);
        return "{$randomName}.{$extension}";
    }

    /**
     * Gabungkan semua chunk
     */
    private function combineChunks(string $uploadId, string $fileName): string
    {
        $finalPath = "uploads/{$fileName}";
        $chunks = Storage::disk($this->disk)->files("temp/{$uploadId}");
        sort($chunks);

        $handle = fopen(Storage::disk($this->disk)->path($finalPath), 'wb');
        foreach ($chunks as $chunk) {
            fwrite($handle, Storage::disk($this->disk)->get($chunk));
        }
        fclose($handle);

        return $finalPath;
    }

    /**
     * Enkripsi file
     */
    private function encryptFile(string $filePath)
    {
        $content = Storage::disk($this->disk)->get($filePath);
        $encrypted = Crypt::encrypt($content);
        Storage::disk($this->disk)->put($filePath, $encrypted);
    }

    /**
     * Generate signed URL
     */
    private function generateSignedUrl(string $filePath): string
    {
        return Storage::disk($this->disk)->temporaryUrl(
            $filePath,
            now()->addHours(24)
        );
    }

    /**
     * Cleanup file temporary
     */
    private function cleanupTempFiles(string $uploadId)
    {
        Storage::disk($this->disk)->deleteDirectory("temp/{$uploadId}");
    }

    /**
     * Cleanup upload yang gagal
     */
    private function cleanupFailedUpload(string $uploadId)
    {
        $this->cleanupTempFiles($uploadId);
        Cache::forget($this->uploadProgressKey);
    }

    /**
     * Get upload progress
     */
    public function getProgress(string $uploadId)
    {
        $this->uploadProgressKey = "upload_progress:{$uploadId}";
        return Cache::get($this->uploadProgressKey);
    }

    /**
     * Cancel upload
     */
    public function cancelUpload(string $uploadId)
    {
        $this->cleanupFailedUpload($uploadId);
        return [
            'success' => true,
            'message' => 'Upload cancelled successfully'
        ];
    }
} 