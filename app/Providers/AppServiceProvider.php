<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        // paginator::useBootstrap;
        Gate::define('admin', function (User $user) {
       
            return $user->level === 'admin';
        });
        Gate::define('dokter', function (User $user) {
       
            return $user->level === 'dokter';
        });

  
    }
}
