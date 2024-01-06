<?php

namespace App\Http\Controllers;

use App\Models\Availibility;
use Illuminate\Http\Request;

class AvailibilityController extends Controller
{
    public function index()
    {
        $availibilities = Availibility::all();
        return $availibilities;
    }

}
