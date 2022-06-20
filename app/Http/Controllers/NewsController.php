<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index ()
    {
        return view('news.index', ['news' => News::orderBy('updated_at', 'desc')->paginate(5)]);
    }

    public function categories ()
    {
        return view('news.categories', ['categories' => Category::all()]);
    }

    public function category ($categoryId)
    {
        $news = Category::find($categoryId)->news()->get();

        return view('news.category', ['news' => $news, 'count' => 0]);
    }

    public function card ($id)
    {
        $news = News::find($id);

        return view('news.card', ['news' => $news]);
    }
}

