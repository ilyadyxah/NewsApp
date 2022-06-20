<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreateRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Author;
use Illuminate\Http\Request;

class NewsController extends Controller
{
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
            ]
        );
    }

    public function delete($id)
    {
        News::destroy([$id]);

        return redirect()->route("admin::news::index");
    }

    public function save(NewsCreateRequest $request)
    {
        $id = $request->post('id');
        $model = $id ? News::find($id) : new News();
        $result = News::create($model, $request);

        return redirect()->route("admin::news::index", ['news' => $model->id])
            ->with('success', $result);
    }


}
