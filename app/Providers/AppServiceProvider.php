<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Force HTTPS in production to prevent Mixed Content errors for images and assets
        if (request()->server('HTTP_X_FORWARDED_PROTO') == 'https' || config('app.env') === 'production' || str_contains(config('app.url'), 'https://')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $siteHero = \App\Models\Hero::first();
            $contact = \App\Models\Contacts::first();
            $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
            $view->with('siteHero', $siteHero)->with('contact', $contact)->with('settings', $settings);
        });
    }
}
