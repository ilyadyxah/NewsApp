<?php

namespace Database\Seeders;

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
        \DB::table('category')
            ->insert([[
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
                ]
            ]);
    }
}
