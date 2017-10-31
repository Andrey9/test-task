<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use DB;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.master', function($view){
            $browsers = DB::table('users')
                ->select('browser', DB::raw('count(*) as total'))
                ->groupBy('browser')
                ->get();

            $view->with('browsers', $browsers);
        });
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
}
