<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $result=DB::select("select * from genre");
        return view::share('genres',$result);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
