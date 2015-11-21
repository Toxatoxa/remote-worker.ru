<?php

namespace App\Providers;

use App\Category;
use App\Tag;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiseProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Compose navigation bar
     */
    private function composeNavigation()
    {
        //view()->composer('partials.menu', 'App\Http\Composers\NavigationComposer');

        view()->composer('partials.menu', function($view)
        {
            //$category = Category::byName($alias)->firstOrFail();
            $view->with('categories', Category::orderByName()->get());
            $view->with('tags', Tag::all());
        });

    }
}
