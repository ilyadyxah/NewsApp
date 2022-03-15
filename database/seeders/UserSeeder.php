<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')
            ->insert([
                [
                    'name' => 'ilya',
                    'email' => 'nizinrech@mail.ru',
                    'password' => \Hash::make('1234'),
                    'admin' => '1',
                    'created_at' => now()
                ],
                ]);
    }
}
