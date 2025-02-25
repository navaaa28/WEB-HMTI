<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Program;
use App\Models\Anggota;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $events = Event::where('is_visible', true)->get();
        $programs = Program::all();
        $registrations = $user->registrations ?? collect();
        $registrations = $user->registrations()->with('ticket')->get();
        $anggotas = Anggota::all();

        return view('dashboard', compact('user', 'events', 'programs', 'registrations', 'anggotas'));

        foreach ($registrations as $registration) {
            if ($registration->status === 'approved' && !$registration->ticket) {
                dd("Status approved tapi tiket belum ada!", $registration);
            }
        }
    
        return view('dashboard', compact('registrations'));
    }
    
}