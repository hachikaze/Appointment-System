<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
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

// LANDING PAGE
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/doctor', [HomeController::class, 'doctor'])->name('doctor');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::middleware(['auth', 'verified', PreventBackHistory::class])->group(function() {

    //FOR PATIENT USERS
    Route::get('/patient/dashboard', [PatientController::class, 'index'])->name('patient.dashboard');
    Route::get('/patient/calendar', action: [PatientController::class, 'calendar'])->name('calendar');
    Route::get('/patient/notifications', action: [PatientController::class, 'notifications'])->name('notifications');
    Route::get('/patient/history', action: [PatientController::class, 'history'])->name('history');
    Route::delete('/patient/appointments/{id}', [PatientController::class, 'destroy'])->name('appointments.destroy');

    // FOR APPOINTMENT
    Route::get('/patient/appointment', function () {
        return view('patient.appointment');
    })->name('appointment');

    // FOR STORING APPOINTMENTS
    Route::post('/patient/appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');

    //FOR ADMIN USERS
    Route::get('/admin_dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/records', [AdminController::class, 'records'])->name('admin.records');
    Route::get('/reports', [AdminController::class, 'reports'])->name('admin.reports');
    Route::get('/approved_appointments', [AdminController::class, 'approvedAppointments'])->name('admin.approved_appointments');
});

// FOR LOGIN
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// FOR REGISTER
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

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