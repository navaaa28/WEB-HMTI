<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        // Ambil data anggota dengan departemen dan divisi
        $anggotas = Anggota::orderBy('departemen')->orderBy('divisi')->get();

        // Kelompokkan data berdasarkan departemen dan divisi
        $groupedAnggotas = $anggotas->groupBy('departemen')->map(function ($departemen) {
            return $departemen->groupBy('divisi');
        });

        // Daftar departemen
        $departemenList = [
            'Pengembangan Sumber Daya Mahasiswa',
            'Penelitian dan Pengembangan',
            'Perhubungan',
            'Bisnis dan Kemitraan',
        ];

        return view('anggota.index', compact('groupedAnggotas', 'departemenList'));
    }
}