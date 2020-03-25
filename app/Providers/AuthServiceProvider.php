<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerAdminPolicies();
        $this->registerUserPolicies();
        //
    }

    public function registerAdminPolicies()
    {
        Gate::define('is-admin', function($User)
        {
            return $User ->hasAccess(['is-admin']);
        }
        );

    }

    public function registerUserPolicies()
    {
        Gate::define('is-user', function($User)
        {
            return $User ->hasAccess(['is-user','is-admin']);
        }
        );

    }
}
