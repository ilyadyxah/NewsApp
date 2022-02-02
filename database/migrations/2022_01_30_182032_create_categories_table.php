<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)
                ->unique()
                ->nullable(false);
            $table->timestamps();
        });

        Schema::table('news', function (Blueprint $table) {
            $table->bigInteger('category_id')
                ->nullable(true)
                ->default(null)
                ->unsigned()
                ->index();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
        });

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
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public
    function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign('news_category_id_foreign');
        });
        Schema::dropColumns('news', ['category_id']);
        Schema::dropIfExists('categories');
    }
}
