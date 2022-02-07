<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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
        $news = News::query()
        ->where('category_id', $categoryId)
        ->get();
        return view('news.category', ['news' => $news, 'count' => 0]);
    }

    public function card ($id)
    {
        $news = News::find($id);
        return view('news.card', ['news' => $news]);
    }

    public function setLocale(Request $request, $lang)
    {

        $request->session()->forget('lang');
        App::setLocale($lang);
//        return redirect()->route('admin::news::create');
        return back();
    }
}

