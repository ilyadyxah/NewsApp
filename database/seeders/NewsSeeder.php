<?php

namespace Database\Seeders;

use DB;
use Faker\Generator;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $generator)
    {
        DB::table('news')
            ->insert([
                    'title' => $generator->text(50),
                    'content' => $generator->text(),
                    'image' => $generator->url(),
                    'category_id' => rand(1,7),
                    'author_id' => 1,
//                    'status_id' => $generator->randomDigitNotNull(),
                    'created_at' => now()
                ]
            );
    }
}
