<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Author;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('updated_at', 'desc')->paginate(3);
        return view('admin.index', ['news' => $news]);
    }

    public function create(Category $category)
    {
        return view('admin.news.create', [
            'model' => new News(),
            'categories' => $category->getList(),
        ]);
    }

    public function update(Category $category, News $news, Author $author)
    {
        return view("admin.news.create", [
                'model' => $news,
                'categories' => $category->getList(),
                'author' => $author->find($news->author_id)
            ]
        );
    }

    public function delete($id)
    {
        News::destroy([$id]);
        return redirect()->route("admin::news::index");
    }

    public function save(Request $request)
    {
        $id = $request->post('id');
        if ($id) {
            $rules = News::rulesUpdate();
            $model = News::find($id);
        }
        else {
            $rules = News::rulesCreate();
            $model = new News();
        }
        $this->validate($request, $rules);
        $result = News::create($model, $request);
        return redirect()->route("admin::news::index", ['news' => $model->id])
            ->with('success', $result);
    }

    public function find(Request $request)
    {
        $success = "Введите название новости";
        $model = News::firstWhere('title', $request->title);
        if ($request->title) {
            $success = $model ? null : "Новость не найдена";
        }
        return view('admin.news.find', ['news' => $model])
            ->with('success', $success);
    }
}
