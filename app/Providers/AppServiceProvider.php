<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  Illuminate\Support\Facades\Schema;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    public function register()
    {
    	$this->app->bind('App\Interfaces\ClienteRepositoryInterface', 'App\Repositories\ClienteRepository');  
		$this->app->bind('App\Interfaces\ServicioRepositoryInterface', 'App\Repositories\ServicioRepository');  
		$this->app->bind('App\Interfaces\EmpresaRepositoryInterface', 'App\Repositories\EmpresaRepository');  
    }
}
