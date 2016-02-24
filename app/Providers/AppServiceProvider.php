<?php

namespace App\Providers;
use Event;
use App\Grafico;
use App\Events\ObjetoMovido;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Grafico::created(function($item){
            Event::fire(new ObjetoMovido($item));
        });
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
