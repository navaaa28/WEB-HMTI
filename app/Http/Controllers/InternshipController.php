<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function index()
    {
        $internships = Internship::where('status', 'active')
            ->orderBy('deadline', 'asc')
            ->get();

        return view('internships.index', compact('internships'));
    }

    public function show(Internship $internship)
    {
        return view('internships.show', compact('internship'));
    }
}