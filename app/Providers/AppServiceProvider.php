<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
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

        // Force HTTPS in production/local environment
        // if ($this->app->environment('local')) {
        //     URL::forceRootUrl(config('app.url'));
        //     URL::forceScheme('https');
        // }
    }
}
