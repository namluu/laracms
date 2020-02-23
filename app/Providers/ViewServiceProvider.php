<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Category;

class ViewServiceProvider extends ServiceProvider
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
        // Using Closure based composers...
        View::composer(['home', 'categories/show'], function ($view) {
            $view->with('categories', $this->getActiveCategories());
        });
    }

    public function getActiveCategories()
    {
        $categories = Category::where('is_active', 1)
            ->orderBy('name', 'desc')
            ->get();
        return $categories;
    }
}