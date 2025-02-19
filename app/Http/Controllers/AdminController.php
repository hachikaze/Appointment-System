<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() 
    {
        return view('admin.dashboard');
    }

    public function create() 
    {
        return view('admin.create');
    }

    public function records() 
    {
        return view('admin.records');
    }

    public function reports() 
    {
        return view('admin.reports');
    }

    public function approvedAppointments() 
    {
        return view('admin.approved_appointments');
    }
}
