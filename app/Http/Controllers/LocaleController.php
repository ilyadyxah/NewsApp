<?php

namespace App\Http\Controllers;

class LocaleController extends Controller
{
    public function index($lang)
    {
        \Session::put('locale', $lang);

        return redirect()->back();
    }
}
