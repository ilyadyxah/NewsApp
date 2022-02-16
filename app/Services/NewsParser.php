<?php

namespace App\Services;

use Orchestra\Parser\Xml\Facade as XmlParser;

class NewsParser
{
    public function run(string $source)
    {
        $xml = XmlParser::load($source);
        $data = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'channel_description' => ['uses' => 'channel.description'],
            'items' => ['uses' => 'channel.item[title,description,link,pubDate,category]'],
        ]);
        return $data;
    }
}
