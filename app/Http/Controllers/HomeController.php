<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Program;
use App\Models\Anggota;
use App\Models\News;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }

        $events = Event::where('is_visible', true)->get();
        $programs = Program::all();
        $anggotas = Anggota::all();
        $news = News::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get();
        
        return view('welcome', compact('events', 'programs', 'anggotas', 'news'));
    }

    public function allNews()
    {
        $news = News::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(12);
        
        $categories = Category::all();
        
        return view('news.index', compact('news', 'categories'));
    }

    public function showNews(News $news)
    {
        if (!$news->is_published) {
            abort(404);
        }
        
        $relatedNews = News::where('is_published', true)
            ->where('id', '!=', $news->id)
            ->where('category_id', $news->category_id)
            ->latest('published_at')
            ->take(3)
            ->get();
        
        return view('news.show', compact('news', 'relatedNews'));
    }
}
