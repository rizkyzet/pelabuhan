<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

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

        Gate::define('admin', function ($user) {
            if ($user->hasRole('admin')) {
                return true;
            }
            return false;
        });
        Gate::define('agen', function ($user) {
            if ($user->hasRole('agen')) {
                return true;
            }
            return false;
        });
        Gate::define('pimpinan', function ($user) {
            if ($user->hasRole('pimpinan')) {
                return true;
            }
            return false;
        });

        Gate::define('profile', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('agen') || $user->hasRole('pimpinan')
                ? Response::allow()
                : Response::deny('Halaman ini hanya untuk admin, user, atau pimpinan.');
        });

        Gate::define('role-area', function ($user) {
            return request()->segment(1) == $user->role->name ? Response::allow() : Response::deny('Halaman ini hanya untuk ' . $user->role->name);
        });
    }
}
