<?php

namespace App\Providers;

use App\Core\repositories\PostRepository;
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
        view()->composer('layouts.carusel', function ($view) {
           $view->with('posts', PostRepository::getPopularPosts());
        });
    }
}
