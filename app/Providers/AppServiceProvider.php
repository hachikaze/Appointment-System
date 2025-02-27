<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
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
                    ->get();
                $view->with('notifications', $notifications);
            }
        });
    }
}
