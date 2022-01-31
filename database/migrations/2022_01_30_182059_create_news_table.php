<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)
                ->unique()
                ->nullable(false);
            $table->dateTime('publish_date')
                ->nullable(false)
                ->index();
            $table->text('content')
                ->nullable(false);
            $table->string('image', 256);
            $table->integer('category_id')
                ->nullable(false);
            $table->integer('author_id');
            $table->integer('status_id')
                ->nullable(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
