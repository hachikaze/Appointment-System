<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class PatientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and is a patient
        if (!Auth::check() || Auth::user()->user_type !== 'patient') {
            return redirect()->back()->with('error', 'Access denied. You are not authorized.');
        }

        $selectedDate = $request->query('hiddenselectedDate');

        if ($selectedDate) {
            try {
                $formattedDate = Carbon::parse(urldecode($selectedDate));
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Invalid date format.');
            }

            // Get today's date
            $today = Carbon::today();

            // If the selected date is in the past, redirect with an error message
            if ($formattedDate->lt($today)) {
                return redirect()->back()->with('error', 'You cannot select a past date.');
            }
        }

        return $next($request);
    }
}
