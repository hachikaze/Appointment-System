<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ForgotPasswordController;  
use App\Http\Controllers\PatientController;
use App\Http\Middleware\PreventBackHistory;
use App\Mail\ForgotPassword;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    try {
        Mail::raw('This is a test email.', function ($message) {
            $message->to('recipient@example.com')->subject('Test Email');
        });

        return "Email sent successfully!";
    } catch (\Exception $e) {
        return "Failed to send email: " . $e->getMessage();
    }
});

Route::get('/forgot-password', function () {
    return view('forgot-password.forgot-password');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::get('/doctor', function () {
    return view('doctor');
});

Route::get('/contact', function () {
    return view('contact');
});

// FOR LOGIN
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// FOR REGISTER
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// GROUPED ROUTES FOR PATIENT WITH MIDDLEWARE
Route::middleware(['auth', 'patientMiddleware'])->group(function () {

    
    
    // FOR APPOINTMENT
    Route::get('/patient/appointment', function () {
        return view('patient.appointment');
    })->name('appointment');

    Route::get('/patient/calendar', action: [PatientController::class, 'index'])->name('calendar');


    Route::get('/patient/notifications', function () {
        return view('patient.notifications');
    })->name('notifications');


    Route::get('/patient/history', function () {
        return view('patient.history');
    })->name('history');

    // FOR STORING APPOINTMENTS
    Route::post('/patient/appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');
});

Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    
    

    Route::get('/create', function () {
        return view('admin.create');
    });

    Route::get('/records', function () {
        return view('admin.records');
    });
    
    Route::get('/reports', function () {
        return view('admin.reports');
    });
    
    Route::get('/approved_appointments', function () {
        return view('admin.approved_appointments');
    });
});

//FOR LOGOUT
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// FORGOT PASSWORD
Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password');
Route::post('/forgot-password-post', [ForgotPasswordController::class, 'forgotPasswordPost'])->name('forgot-password-post');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('reset-password');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPasswordPost'])->name('reset-password-post');
Route::post('/resend-password-reset-link', [ForgotPasswordController::class, 'resendPasswordResetLink'])->name('resend-password-reset-link');

//EMAIL VERIFICATION
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    switch ($request->user()->user_type) {
        case 'admin':
            return redirect()->route('admin.dashboard')->with('success', 'Your email has been successfully verified.');
        case 'patient':
            return redirect()->route('patient.dashboard')->with('success', 'Your email has been successfully verified.');
        default:
            return redirect()->route('patient.dashboard')->with('success', 'Your email has been successfully verified.');
    }
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    Auth::user()->sendEmailVerificationNotification();

    return redirect('/email/verify')->with('success', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth', 'verified', PreventBackHistory::class])->group(function() {

    //FOR PATIENT USERS
    Route::get('/patient_dashboard', [PatientController::class, 'index'])->name('patient.dashboard');

    Route::get('/admin_dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});