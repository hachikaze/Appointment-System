<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PatientController;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return view('forgot-password.new-password');
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('patient.dashboard');

Route::get('/admin_dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

// GROUPED ROUTES FOR PATIENT WITH MIDDLEWARE
Route::middleware(['auth', 'patientMiddleware'])->group(function () {

    Route::get('/patient/appointment', function () {
        return view('patient.appointment');
    })->name('appointment');

    // Route::get('/patient/appointment', [AppointmentController::class, 'showAppointments'])->name('appointment');

    Route::get('/patient/calendar', action: [PatientController::class, 'index'])->name('calendar');
    Route::delete('/patient/appointments/{id}', [PatientController::class, 'destroy'])->name('appointments.destroy');

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
