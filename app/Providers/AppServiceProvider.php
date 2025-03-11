<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Appointment;
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
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $userEmail = Auth::user()->email;

                $notifications = Appointment::where('email', $userEmail)
                    ->whereIn('status', ['Cancelled', 'Pending', 'Approved', 'Attended'])
                    ->whereNull('updated_at')
                    ->get();

                $notifcount = Appointment::where('email', $userEmail)
                    ->whereNull('updated_at')
                    ->count();

                // Pass both notifications and count to all views
                $view->with([
                    'notifications' => $notifications,
                    'notifcount' => $notifcount
                ]);
            }
        });

        Gate::define('view-logHistory', function ($user) {
            return $user->user_type === 'admin';
        });

        Gate::define('view-users', function ($user) {
            return $user->user_type === 'admin';
        });
    }
}
