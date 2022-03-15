<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVkKeyToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('id_in_soc', 20)
            ->default('');
            $table->enum('type_auth', ['site', 'vk', 'fb'])
                ->default('site');
            $table->string('avatar', 256)
                ->default('');
            $table->index('id_in_soc');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('users', ['id_in_soc', 'type_auth', 'avatar']);
    }
}
