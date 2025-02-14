<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/doctor', function () {
    return view('doctor');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', function () {
    return view('login');
});

// FOR APPOINTMENT
Route::get('/appointment', function () {
    return view('appointment');
})->name('appointment');

Route::post('/appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');