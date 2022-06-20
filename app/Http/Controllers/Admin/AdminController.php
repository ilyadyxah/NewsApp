<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;

class AdminController
{
    public function index()
    {
        $news = News::orderBy('updated_at', 'desc')->paginate(6);

        return view('admin.index', ['news' => $news]);
    }
}
