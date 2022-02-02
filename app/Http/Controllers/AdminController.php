<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Author;
use App\Models\OldCategories;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Route;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

//    public function addCategory($category = null)
//    {
//        return view('admin.create_category', ['category' => $category]);
//    }
//
//    public function createCategory(Request $request)
//    {
//        $category = (new OldCategories())->addCategory($request);
//        return redirect()->action([AdminController::class, 'addCategory'], ['category' => $category]);
//    }

    public function addNews($response = null)
    {
        return view('admin.create_news', ['response' => $response]);
    }

    public function createNews(Request $request)
    {
        $response = News::createNewsIfNotExist($request);
        return redirect()->route('admin::news::add', ['response' => $response]);
    }

    public function findNews(int $response = 0, $reply = null)
    {
        return view('admin.find_news', ['response' => $response], ['reply' => $reply]);
    }

    public function getNews(Request $request)
    {
        $response = News::getNewsByTitle($request);
        if ($response->count() != 0) {
            return view('admin.find_news', ['response' => $response, 'reply' => null]);
        }
        else {
            return redirect()->route('admin::news::findNews', ['response' => 0, 'reply' => 'Новости с таким названием нет']);
        }
    }

    public function deleteNews($news_id)
    {
        News::destroy($news_id);
        return redirect()->route('admin::news::findNews', ['response' => 0, 'reply' => 'Новость удалена']);
    }

    public function updateNews($news_id)
    {
        $news = News::find($news_id);
        $category = Category::find($news->category_id);
        $author = Author::find($news->author_id);
        return view('admin.update_news', ['news' => $news, 'author' => $author, 'category' => $category]);
    }

    public function applyUpdateNews(Request $request)
    {
        $news = News::find($request->id);
        $news->title = $request->title;
        $news->content = $request->content;
        $news->save();
        $reply = 'Новость отредактирована';
        return view('admin.find_news', ['response' => 0, 'reply' => $reply]);
    }
}
