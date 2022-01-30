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
        \DB::table('author')
            ->insert([
                    'first_name' => $generator->firstName(),
                    'last_name' => $generator->lastName(),
                    'created_at' => now()
            ]);
    }
}
