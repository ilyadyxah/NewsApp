<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $generator)
    {
        \DB::table('authors')
            ->insert([
                'name' => $generator->name(),
                'created_at' => now()
            ]);
    }
}
