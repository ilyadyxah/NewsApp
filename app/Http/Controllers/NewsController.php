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

    public function categories ()
    {
        return view('news.categories');
    }

    public function category ($id)
    {
        return view('news.news_category', ['id' => $id, 'count' => 0]);
    }

    public function card ($id)
    {
        return view('news.news_card', ['id' => $id]);
    }

    public function addNews ()
    {
        return '<form name="add_news" method="post" action="#" style="padding: 15px; width: 388px">
                   <input type="text" name="title" placeholder="Название" style="width: 388px; height: 30px"><br>
                   <input type="text" name="brief_content" placeholder="Краткое содержание" style="width: 388px; height: 30px"><br>
                   <textarea name="content" placeholder="Контент" cols="50" rows="15"></textarea><br>
                   <input type="submit" name="submit" value="Отправить новость">';
    }
}

