<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Title;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share the title with all views
        View::composer('*', function ($view) {
            $title = Title::orderBy('id', 'desc')->first();
            $view->with('title', $title);
        });
    }

    public function register()
    {
        //
    }
}

