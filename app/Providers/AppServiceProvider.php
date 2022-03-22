<?php

namespace App\Providers;

use App\Core\repositories\CategoryRepository;
use App\Core\repositories\PostRepository;
use App\Core\repositories\TagRepository;
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
        view()->composer(['layouts.carusel', 'layouts.sidebar'], function ($view) {
           $view->with('posts', PostRepository::getPopularPosts());
        });
        view()->composer('layouts.sidebar', function ($view) {
           $view->with('categories', CategoryRepository::getCategories());
        });
        view()->composer('layouts.sidebar', function ($view) {
           $view->with('tags', TagRepository::getTags());
        });
    }
}
