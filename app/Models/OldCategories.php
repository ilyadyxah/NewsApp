<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OldCategories
{
    public function getCategories()
    {
        $sql = "SELECT * FROM news_portal.category";
        $result = DB::select($sql);
        return $result;
    }

    public function addCategory($request)
    {
        if (is_array($request)) {
            return $request['title'];
        }
        else
        return $request->input('title');
    }
}
