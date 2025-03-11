<?php
namespace App\Providers;

use App\Models\Message;
use App\Models\UserMessages;
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
            $auth = Auth::user();
            if (Auth::check()) {
                $userEmail = $auth->email;
                $userId = $auth->id;
                $userImage = $auth->image_path;
                $fullname = $auth->firstname . ' ' . $auth->lastname;
                $notifications = Appointment::where('email', $userEmail)
                    ->whereIn('status', ['Cancelled', 'Pending', 'Approved', 'Attended'])
                    ->whereNotNull('updated_at')
                    ->get();
                $messagesnotif = UserMessages::where('receiver_id', $userId)
                    ->whereNull('read_at')
                    ->get();
                $notifcount = Appointment::where('email', $userEmail)
                    ->whereNotNull('updated_at')
                    ->count();

                $messagecount = UserMessages::where('receiver_id', $userId)
                    ->whereNull('read_at')
                    ->count();
                $view->with([
                    'fullname' => $fullname,
                    'userImage' => $userImage,
                    'notifications' => $notifications,
                    'notifcount' => $notifcount,
                    'messagenotif' => $messagesnotif,
                    'messagecount' => $messagecount
                ]);
            }
        });
    }
}