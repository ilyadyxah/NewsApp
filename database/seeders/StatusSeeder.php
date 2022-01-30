<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('status')
            ->insert([
                [
                    'name' => 'Created',
                    'created_at' => now()
                ],
                [
                    'name' => 'Published',
                    'created_at' => now()
                ]
            ]);
    }
}
