<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Contracts\Auth\Access\Gate as AccessGate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('see-all', fn (User $user) =>
            $user->rol == User::ROLE_ADM
        );
        Gate::define('see-extraescolares', fn (User $user) =>
            $user->rol == User::ROLE_ADMEXT
        );
        Gate::define('see-clubs', fn (User $user) =>
            $user->rol == User::ROLE_TEACHER
        );
        Gate::define('clubs', fn (User $user) =>
            $user->rol == User::ROLE_STUDENT
        );
        Gate::define('egresados', fn (User $user) =>
            $user->rol == User::ROLE_EGRESADO
        );


        
        
    }
}
