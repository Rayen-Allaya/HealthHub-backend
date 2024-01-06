<?php

namespace App\Http\Controllers;

use App\Models\DoctorProfile;
use Illuminate\Http\Request;

class DoctorProfileController extends Controller
{
    public function index()
    {
        $doctors_profile = DoctorProfile::all();
        return $doctors_profile;
    }
}
