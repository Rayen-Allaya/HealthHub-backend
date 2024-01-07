<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index($doctor_id)
    {
        $reviews = Review::where("doctor_id", $doctor_id)->orderBy('rating', "desc")->get();
        return response()->json($reviews);
    }

    public function delete($id)
    {
        $review = Review::find($id);
        $review->delete();
        return response()->json(['message' => 'Review deleted successfully'], 200);
    }
}
