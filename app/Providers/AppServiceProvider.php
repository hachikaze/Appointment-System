<?php
namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        
    }

    public function boot(): void
    {
        date_default_timezone_set('Asia/Manila');
        
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
                $view->with([
                    'notifications' => $notifications,
                    'notifcount' => $notifcount
                ]);
            }
        });
    }
}