<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('dashboard_admin' , function($user){
            return $user->hasRole(1);
        });
        Gate::define('dashboard_streamer' , function($user){
            return $user->hasRole(2);
        });
        Gate::define('dashboard_user' , function($user){
            return $user->hasRole(3);
        });
        Gate::define('dashboard_validator' , function($user){
            return $user->hasRole(4);
        });
        //
    }
}
