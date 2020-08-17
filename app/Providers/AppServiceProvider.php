<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //service
        $this->app->bind('App\Contracts\Services\PostServiceInterface', 'App\Services\PostService');
        $this->app->bind('App\Contracts\Services\ProfileServiceInterface', 'App\Services\ProfileService');

        //dao
        $this->app->bind('App\Contracts\Dao\PostDaoInterface', 'App\Dao\PostDao');
        $this->app->bind('App\Contracts\Dao\ProfileDaoInterface', 'App\Dao\ProfileDao');
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
