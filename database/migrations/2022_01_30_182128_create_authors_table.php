<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name', '50')
                ->nullable(false)
                ->index();
            $table->timestamps();
        });

        Schema::table('news', function (Blueprint $table) {
            $table->bigInteger('author_id')
                ->nullable(true)
                ->default(null)
                ->unsigned()
                ->index();
            $table->foreign('author_id')
                ->references('id')
                ->on('authors');
        });

        DB::table('authors')
            ->insertOrIgnore([
                [
                    'name' => 'Alibaba',
                    'created_at' => now()
                ],
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign('news_author_id_foreign');
        });

        Schema::dropColumns('news', ['author_id']);
        Schema::dropIfExists('authors');
    }
}
