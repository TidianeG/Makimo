<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
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
         Gate::define('admin',function(User $user){
            return $user->isAdmin();
         });
            Gate::define('moderator', function(User $user){
             return $user->isModerator();
         });
            Gate::define('user', function(User $user){
             return $user->isUser();
         });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
        if(config('app.env') === 'production'){
            \URL::forceScheme('https');
        }
    }
}
