<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategorySaveRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('updated_at', 'desc')->paginate(5);
        return view('admin.category.create', ['categories' => $categories]);
    }

    public function update($id)
    {
        $category = Category::find($id);
        return view('admin.category.create', ['category' => $category]);
    }

    public function delete($id)
    {
        Category::destroy($id);
        return redirect()->route('admin::category::create')
            ->with(['success' => 'Категория удалена']);
    }

    public function save(AdminCategorySaveRequest $request)
    {
        $id = $request->post('id');
        $model = $id ? Category::find($id) : new Category();
        $model->name = $request->title;
        $model->save();
        return redirect()->route('admin::category::create')
            ->with(['success' => 'Категория сохранена']);
    }
}
