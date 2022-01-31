<?php

namespace App\Providers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $news = (new News())->getNews();
//        $categories = (new Categories())->getCategories();
//        \View::share('news', $news);
//        \View::share('categories', $categories);
    }
}
