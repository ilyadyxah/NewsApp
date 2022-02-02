<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')
            ->insertOrIgnore([
                [
                'name' => 'Politics',
                'created_at' => now()
                ],
                [
                    'name' => 'Sport',
                    'created_at' => now()
                ],
                [
                    'name' => 'Accidents',
                    'created_at' => now()
                ],
                [
                    'name' => 'Economy',
                    'created_at' => now()
                ],
                [
                    'name' => 'Ecology',
                    'created_at' => now()
                ],
                [
                    'name' => 'Society',
                    'created_at' => now()
                ],
                [
                    'name' => 'Culture',
                    'created_at' => now()
                ]
            ]);
    }
}
