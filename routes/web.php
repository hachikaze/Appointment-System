<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAppointmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageAppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PreventBackHistory;
use App\Mail\ForgotPassword;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

// Test route
Route::get('/test', [PaymentController::class, 'receipt'])->name('payment');

Route::get('/receipts', [PaymentController::class, 'index'])->name('receipts.create');
Route::post('/receipts', [PaymentController::class, 'store'])->name('receipts.store');
Route::get('/receipts/{id}', [PaymentController::class, 'show'])->name('receipt.show');

// LANDING PAGE
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/doctor', [HomeController::class, 'doctor'])->name('doctor');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::middleware(['auth', 'verified', PreventBackHistory::class])->group(function () {
    // FOR PATIENT USERS
    Route::middleware(['patientMiddleware'])->group(function () {
        Route::get('/patient/dashboard', [PatientController::class, 'index'])->name('patient.dashboard');
        Route::get('/patient/calendar', [PatientController::class, 'calendar'])->name('calendar');
        Route::get('/patient/notifications', [PatientController::class, 'notifications'])->name('notifications');
        Route::get('/patient/history', [PatientController::class, 'history'])->name('history');
        Route::get('/view-history/{appointmentId}', [PatientController::class, 'viewHistory'])->name('viewhistory');

        Route::delete('/patient/appointments/{id}', [PatientController::class, 'destroy'])->name('appointments.destroy');
        Route::get('/patient/profile', [LoginController::class, 'profile'])->name('profile');
        Route::put('patient/users/{id}', [LoginController::class, 'update'])->name('profile.update');
    });

    // FOR APPOINTMENT
    Route::get('/patient/appointment', function () {
        return view('patient.appointment');
    })->name('appointment');

    // FOR NOTIFICATIONS
    Route::get('/appointment/update/{id}', [AppointmentController::class, 'markAsRead'])
        ->name('appointment.markAsRead');

    // FOR STORING APPOINTMENTS
    Route::post('/patient/appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');

    // FOR ADMIN USERS
    Route::middleware(['adminMiddleware'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');
        Route::get('/admin/graph', [AppointmentController::class, 'graph'])->name('admin.graph');
        Route::get('/admin/approved_appointments', [AdminController::class, 'approvedAppointments'])->name('admin.approved_appointments');

        // User Management Routes
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
        Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store'); // IMPORTANT: Change to UserController
        Route::get('/admin/users/{user}', [UserController::class, 'getUser'])->name('admin.users.get'); // IMPORTANT: Change to UserController
        Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update'); // IMPORTANT: Change to UserController
        Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy'); // IMPORTANT: Change to UserController

        // Legacy route - keep for backward compatibility
        Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/admin/manage_appointments', [ManageAppointmentController::class, 'index'])->name('appointments.index');
        Route::post('/admin/appointments/action', [ManageAppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');

        // Enhanced calendar routes
        Route::get('/admin/calendar', [AdminAppointmentController::class, 'calendar'])->name('admin.calendar');
        Route::get('/admin/calendar/appointments', [AdminAppointmentController::class, 'getCalendarAppointments'])->name('admin.calendar.appointments');
    });
});

// FOR LOGIN
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// FOR REGISTER
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// FOR LOGOUT
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

// FORGOT PASSWORD
Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password');
Route::post('/forgot-password-post', [ForgotPasswordController::class, 'forgotPasswordPost'])->name('forgot-password-post');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('reset-password');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPasswordPost'])->name('reset-password-post');
Route::post('/resend-password-reset-link', [ForgotPasswordController::class, 'resendPasswordResetLink'])->name('resend-password-reset-link');

// EMAIL VERIFICATION
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    switch ($request->user()->user_type) {
        case 'admin':
        case 'staff':
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

// APPOINTMENTS
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/admin/appointments', [AdminAppointmentController::class, 'index'])->name('admin.appointments.index');
Route::get('/admin/appointments/create', [AdminAppointmentController::class, 'create'])->name('admin.appointments.create');
Route::post('/admin/appointments/store', [AdminAppointmentController::class, 'store'])->name('admin.appointments.store');
// Route::post('/appointments/send-message', [ManageAppointmentController::class, 'sendMessage'])->name('appointments.sendMessage');