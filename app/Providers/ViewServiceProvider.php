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
            $user = auth()->user();
            $userId = 0;
            
            if ($user) {
                if($user->type == 'admin'){
                    $userId = $user->id;     
                } else {
                    $userId = $user->firmaid;
                }
            }
            
            $title = Title::where('firmaid', $userId)->first();
            $view->with('title', $title);
        });
    }

    public function register()
    {
        //
    }
}