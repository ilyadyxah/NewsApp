<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function parser()
    {
        $xml = XmlParser::load('http://news.rambler.ru/rss/world/');
        $data = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'channel_description' => ['uses' => 'channel.description'],
            'items' => ['uses' => 'channel.item[title,description,link,pubDate,category]'],
        ]);
        $count = $this->writeToDb($data);
        return redirect()->route('admin::news::index')->with('count', $count);
    }

    public function writeToDb($data) // Процесс записи в БД. Остановился на нахождении соответствия в бд.
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
