<?php

namespace App\Providers;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        // Regisztráljuk a Filament kijelentkezési esemény kezelőjét
        Event::listen(\Filament\Events\Auth\Logout::class, function ($event) {
            // Törli a kilépett felhasználó összes tokenjét
            $event->user->tokens()->delete();
        });
    }

}
