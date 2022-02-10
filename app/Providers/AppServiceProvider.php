<?php

namespace App\Providers;

use App\Models\OldCategories;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
    public function boot(User $user, \Request $request)
    {
        Paginator::useBootstrap();
//        $news = (new News())->getNews();
//        $categories = (new OldCategories())->getCategories();
//        \View::share('user', $request->user());
//        \View::share('categories', $categories);
    }
}
