<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Discord\Provider;
use App\Helpers\LocationHelper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // register bindings here if needed
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share authenticated user data with all views
        View::composer('*', function ($view) {
            // Provide defaults so views can render safely for guests
            $user = null;
            $name = 'Guest';
            $role = 'guest';
            $avatar = url('assets/images/user/default-avatar.png');

            if (Auth::check()) {
                $user = Auth::user();
                $name = $user->name;
                $role = $user->role;
                $avatar = $user->provider == null
                    ? url('assets/images/user/' . $user->avatar)
                    : $user->avatar;
            }

            // share tempat lahir list for forms (if helper exists)
            try {
                $tempatLahirList = LocationHelper::getTempatLahirGrouped();
                $view->with('tempatLahirList', $tempatLahirList);
            } catch (\Throwable $e) {
                // ignore if helper not available in some environments
            }

            $view->with(compact('user', 'name', 'role', 'avatar'));
        });

        // Register Socialite provider
        Event::listen(SocialiteWasCalled::class, function (SocialiteWasCalled $event) {
            $event->extendSocialite('discord', Provider::class);
        });

        // Rate limiters for auth-related endpoints to mitigate brute-force attacks
        RateLimiter::for('login', function (Request $request) {
            $key = $request->input('nik').'|'.$request->ip();
            return Limit::perMinute(5)->by($key);
        });

        RateLimiter::for('register', function (Request $request) {
            return Limit::perMinute(3)->by($request->ip());
        });

        RateLimiter::for('otp', function (Request $request) {
            return Limit::perMinute(3)->by($request->ip());
        });

        RateLimiter::for('password', function (Request $request) {
            return Limit::perMinute(3)->by($request->ip());
        });

        // Global input sanitization (lightweight) - defense in depth for SQLi/XSS
        // We register a middleware into the "web" group to sanitize incoming request data
        $this->app['router']->pushMiddlewareToGroup('web', \App\Http\Middleware\SanitizeInput::class);

        // Force HTTPS in production/local environment
        // if ($this->app->environment('local')) {
        //     URL::forceRootUrl(config('app.url'));
        //     URL::forceScheme('https');
        // }
    }
}
