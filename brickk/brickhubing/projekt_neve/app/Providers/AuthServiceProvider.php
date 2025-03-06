<?php

namespace App\Providers;

use App\Providers\CustomUser; // Helyes importálás
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Itt definiáld a policy-ket
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Regisztráljuk a saját auth providert
        Auth::provider('custom', function ($app, array $config) {
            return new CustomUser($app['hash'], $config['model']);
        });
    }
}
