<?php

namespace App\Providers;

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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-view', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('warehouse-view', function($user){
            return $user->hasAnyRoles(['admin','warehouse']);
        });

        Gate::define('supplier-view', function($user){
            return $user->hasAnyRoles(['admin','supplier']);
        });

        Gate::define('bar-view', function($user){
            return $user->hasAnyRoles(['admin','bar']);
        });

        Gate::define('a-w-b', function($user){
            return $user->hasAnyRoles(['admin','warehouse','bar']);
        });

        Gate::define('a-w-s', function($user){
            return $user->hasAnyRoles(['admin','warehouse','supplier']);
        });
    }
}
