<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Review;

class ReviewController extends Controller
{   
    public function index()
    {
        $reviews = Review::all();
        return response()->json($reviews);
    }
    public function delete($id)
    {
        $review = Review::find($id);
        $review->delete();
        return response()->json(['message' => 'Review deleted successfully'], 200);
    }
    
}
