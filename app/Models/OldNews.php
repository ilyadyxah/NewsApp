<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class OldNews
{
    public function getNews()
    {
        $sql = "SELECT * FROM news_portal.news";
        $result = DB::select($sql);
        return $result;
    }

    public function getNewsByCategory($id)
    {
        $sql = "SELECT * FROM news_portal.news WHERE category_id = :id";
        $result = DB::select($sql, [$id]);
        return $result;
    }

    public function getNewsById($id)
    {
        $sql = "SELECT * FROM news_portal.news WHERE id = :id";
        $result = DB::selectOne($sql, [$id]);
        return $result;
    }
}
