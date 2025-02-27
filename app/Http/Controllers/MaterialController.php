<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Log;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with('course')
            ->latest()
            ->paginate(10);
            
        $courses = Course::all();
        
        return view('materials.index', compact('materials', 'courses'));
    }

    public function download(Material $material)
    {
        // Log untuk debugging
        Log::info('Attempting to download file:', [
            'file_path' => $material->file_path,
            'exists' => Storage::exists($material->file_path)
        ]);

        $extension = strtolower($material->file_type);
        $filePath = storage_path('app/public/' . $material->file_path);

        // Cek apakah file ada
        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan.');
        }

        // Set header berdasarkan tipe file
        $headers = [
            'Content-Type' => $this->getContentType($extension),
            'Content-Disposition' => 'attachment; filename="' . $material->file_name . '"',
            'Cache-Control' => 'private, no-transform, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0'
        ];

        // Untuk file binary (docx, xlsx) gunakan readfile langsung
        if (in_array($extension, ['docx', 'xlsx'])) {
            ob_end_clean(); // Bersihkan output buffer
            
            // Set semua header
            foreach ($headers as $key => $value) {
                header("$key: $value");
            }
            
            // Set header tambahan untuk binary
            header('Content-Length: ' . filesize($filePath));
            header('Accept-Ranges: bytes');
            
            // Baca dan kirim file
            readfile($filePath);
            exit;
        }

        // Untuk file lain (PDF, dll) gunakan Storage::download
        return Storage::disk('public')->download($material->file_path, $material->file_name, $headers);
    }

    private function getContentType(string $extension): string
    {
        return match (strtolower($extension)) {
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xls' => 'application/vnd.ms-excel',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            default => 'application/octet-stream',
        };
    }
}