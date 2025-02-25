<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Program;
use App\Models\Anggota;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::where('is_visible', true)->get();
        $programs = Program::all();
        $anggotas = Anggota::all();
        
        return view('welcome', compact('events', 'programs', 'anggotas'));
    }
}
