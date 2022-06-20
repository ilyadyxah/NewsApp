<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Models\Category;
use App\Models\News;

class ParserController extends Controller
{
    public function parser()
    {
        $sources = [
            'http://news.rambler.ru/rss/world/',
            'https://news.rambler.ru/rss/holiday/',
            'https://news.rambler.ru/rss/politics/',
            'https://news.rambler.ru/rss/community/1',
        ];
        foreach ($sources as $source) {
            NewsParsingJob::dispatch($source);
        }

        return redirect()->route('admin::news::index');
    }

    public static function writeToDb($data) // Процесс записи в БД. Остановился на нахождении соответствия в бд.
    {
        $count = 0;

        foreach ($data['items'] as $item) {
            if (!News::query()->where(['title' => $item['title']])->first()) {
                $news = new News();
                $news->title = $item['title'];
                $news->content = $item['description'];
                $news->link = $item['link'];
                $news->publish = $item['pubDate'];
                $news->category_id = Category::firstOrCreate(['name' => $item['category']])->id;
                $news->source = $data['channel_title'];
                $news->save();
                $count ++;
            }
        }

        return $count;
    }
}
