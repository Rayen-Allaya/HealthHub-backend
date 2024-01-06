<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Review;

class ReviewController extends Controller
{   
    public function index()
    {
        $reviews = Review::all();
        return $reviews;
    }
    
}
