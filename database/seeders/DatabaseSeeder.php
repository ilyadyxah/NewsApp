<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NewsSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(AuthorSeeder::class);
    }
}
