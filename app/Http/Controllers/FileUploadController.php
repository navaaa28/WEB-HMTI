<?php

namespace App\Http\Controllers;

use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FileUploadController extends Controller
{
    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * Mulai proses upload
     */
    public function startUpload(Request $request)
    {
        try {
            $request->validate([
                'fileName' => 'required|string',
                'totalSize' => 'required|integer|min:1'
            ]);

            $result = $this->fileUploadService->startUpload(
                $request->fileName,
                $request->totalSize
            );

            return response()->json($result);

        } catch (\Exception $e) {
            Log::error('Failed to start upload', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to start upload: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Proses chunk upload
     */
    public function uploadChunk(Request $request)
    {
        try {
            $request->validate([
                'uploadId' => 'required|string',
                'chunk' => 'required|file',
                'chunkIndex' => 'required|integer|min:0'
            ]);

            $result = $this->fileUploadService->processChunk(
                $request->uploadId,
                $request->file('chunk'),
                $request->chunkIndex
            );

            return response()->json($result);

        } catch (\Exception $e) {
            Log::error('Failed to process chunk', [
                'uploadId' => $request->uploadId,
                'chunkIndex' => $request->chunkIndex,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to process chunk: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get upload progress
     */
    public function getProgress(Request $request)
    {
        try {
            $request->validate([
                'uploadId' => 'required|string'
            ]);

            $progress = $this->fileUploadService->getProgress($request->uploadId);

            if (!$progress) {
                return response()->json([
                    'success' => false,
                    'message' => 'Upload session not found or expired'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'progress' => $progress
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to get progress', [
                'uploadId' => $request->uploadId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to get progress: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Cancel upload
     */
    public function cancelUpload(Request $request)
    {
        try {
            $request->validate([
                'uploadId' => 'required|string'
            ]);

            $result = $this->fileUploadService->cancelUpload($request->uploadId);

            return response()->json($result);

        } catch (\Exception $e) {
            Log::error('Failed to cancel upload', [
                'uploadId' => $request->uploadId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to cancel upload: ' . $e->getMessage()
            ], 500);
        }
    }
} 