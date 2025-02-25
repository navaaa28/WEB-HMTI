<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;
use Illuminate\Support\Facades\Auth;

class AspirasiController extends Controller
{
    // Menampilkan form aspirasi
    public function create()
    {
        return view('aspirasi.create');
    }

    // Menyimpan aspirasi ke database
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'aspirasi' => 'required|string|max:1000',
    ]);

    // Simpan aspirasi ke database
    Aspirasi::create([
        'user_id' => Auth::id(), // Ambil ID user yang sedang login
        'nim' => Auth::user()->nim, // Ambil NIM user yang sedang login
        'aspirasi' => $request->aspirasi,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('aspirasi.create')->with('success', 'Aspirasi Anda berhasil dikirim!');
}
}