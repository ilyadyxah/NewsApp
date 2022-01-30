<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function createNews ()
    {
        return redirect()->route('admin::news::add');
    }

    public function addNews ()
    {
        return view('admin.news.create');
    }

    public function createCategory (Request $request)
    {
        $category = (new Categories())->addCategory($request);
        return redirect()->action([AdminController::class, 'addCategory'], ['category' => $category]);
    }

    public function addCategory ($category = null)
    {
        return view('admin.category.create_category', ['category' => $category]);
    }

}
