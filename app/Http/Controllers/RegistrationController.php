<?php

// app/Http/Controllers/RegistrationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        // Ambil data registrasi user yang sedang login
        $registrations = Auth::user()->registrations()->with('event')->get();

        return view('registrations.index', compact('registrations'));
    }
}