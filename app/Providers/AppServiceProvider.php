<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Competition;
use App\Models\exercice;
use Illuminate\Support\Facades\View;


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

    static function getDataGeneral()
    {
            $compet = Competition::orderBy('date_compet', 'desc')->take(3)->get();
            $exo = exercice::orderBy('created_at', 'desc')->take(2)->get();
            return ['compets' => $compet, 'exos' => $exo];
        }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Schema::defaultStringLength(191);
        // $compet = Competition::orderBy('date_compet')->take(3)->get();
        // View::share('compets', $compet);
        foreach(self::getDataGeneral() as $key => $value){
            View::share($key, $value);
        }
    }
}
