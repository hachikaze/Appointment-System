<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class SentimentController extends Controller
{
    public function index()
    {
        // 1. Load reviews along with user info (if needed)
        $reviews = Review::with('user')->get();

        // 2. Pass reviews to the view
        return view('admin.sentiment_analysis', compact('reviews'));
    }
}

