<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function index(Request $request)
    {
        $query = Internship::where('status', 'active');
        
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('company', 'like', "%{$searchTerm}%")
                  ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }
        
        if ($request->has('location') && $request->location != '') {
            $query->where('location', $request->location);
        }
        
        $locations = Internship::where('status', 'active')
                              ->distinct('location')
                              ->pluck('location')
                              ->toArray();
        
        $internships = $query->orderBy('deadline', 'asc')->get();
        
        return view('internships.index', compact('internships', 'locations'));
    }

    public function show(Internship $internship)
    {
        return view('internships.show', compact('internship'));
    }
}