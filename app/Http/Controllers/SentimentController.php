<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SentimentController extends Controller
{
    public function index()
    {
        return view('admin.sentiment_analysis');
    }
}

