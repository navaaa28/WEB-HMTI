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

        // Cek apakah file ada di storage
        if (!Storage::exists($material->file_path)) {
            // Coba cek di public disk
            if (!Storage::disk('public')->exists($material->file_path)) {
                abort(404, 'File tidak ditemukan.');
            }
            
            // Jika file ada di public disk, gunakan itu
            return Storage::disk('public')->download(
                $material->file_path,
                $material->file_name,
                [
                    'Content-Type' => $this->getContentType($material->file_type),
                    'Content-Disposition' => 'attachment; filename="' . $material->file_name . '"'
                ]
            );
        }

        // Jika file ada di default disk
        return Storage::download(
            $material->file_path,
            $material->file_name,
            [
                'Content-Type' => $this->getContentType($material->file_type),
                'Content-Disposition' => 'attachment; filename="' . $material->file_name . '"'
            ]
        );
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