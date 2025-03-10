<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Filament\Events\Auth\Login;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Kijelentkezéskor töröljük a felhasználó összes tokenjét
        Event::listen(\Filament\Events\Auth\Logout::class, function ($event) {
            $event->user->tokens()->delete();
        });

        // Bejelentkezéskor, ha nincs "remember me", töröljük a korábbi tokeneket
        Event::listen(Login::class, function ($event) {
            if (!$event->remember) {
                $event->user->deleteRememberToken();
            }
        });
    }
}
