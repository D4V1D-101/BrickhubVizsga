<?php

namespace App\Providers;

use App\Providers\CustomUser ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [];

    public function boot(): void
    {
        $this->registerPolicies();

        Auth::provider('custom', function ($app, array $config) {
            return new CustomUser ($app['hash'], $config['model']);
        });
    }
}
