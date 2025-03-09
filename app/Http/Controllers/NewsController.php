<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');
        $news = News::where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('news.index', [
            'news' => $news,
            'search_query' => $query
        ]);
    }

    public function category(Category $category)
    {
        $news = $category->news()
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('news.category', [
            'category' => $category,
            'news' => $news
        ]);
    }

    public function related(News $news)
    {
        $related = News::where('category_id', $news->category_id)
            ->where('id', '!=', $news->id)
            ->latest()
            ->take(3)
            ->get();

        return response()->json([
            'news' => $related
        ]);
    }
}
