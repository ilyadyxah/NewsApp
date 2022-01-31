<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index ()
    {
        return view('news.index');
    }

    public function allNews (News $news)
    {
        $all_news = $news->getNews();
        return view('news.all_news', ['news' => $all_news]);
    }

    public function categories (Categories $categories)
    {
        $all_categories = $categories->getCategories();
        return view('news.categories', ['categories' => $all_categories]);
    }

    public function category (News $news, $id)
    {
        $category_news = $news->getNewsByCategory($id);
        return view('news.news_category', ['news' => $category_news, 'count' => 0]);
    }

    public function card (News $news, $id)
    {
        $new = $news->getNewsById($id);
        return view('news.news_card', ['new' => $new]);
    }
}

