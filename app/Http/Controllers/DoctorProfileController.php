<?php

namespace App\Http\Controllers;

use App\Models\DoctorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DoctorProfileController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->all();

        $query["name"] = array_key_exists("name", $query) ? $query["name"] : "";
        $query["governorate"] = array_key_exists("governorate", $query) ? $query["governorate"] : "";
        $query["speciality"] = array_key_exists("speciality", $query) ? $query["speciality"] : "";
        $doctors_profile = DoctorProfile::where(DB::raw('lower(name)'), 'like', "%" . Str::lower($query["name"]) . "%")
            ->where(DB::raw('lower(governorate)'), 'like', "%" . Str::lower($query["governorate"]) . "%")
            ->where(DB::raw('lower(speciality)'), 'like', "%" . Str::lower($query["speciality"]) . "%")
            ->with("user")->orderBy("rating", "desc")->get();

        return $doctors_profile;
    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'speciality' => 'required|string',
            'cost' => 'required|numeric',
            'governorate' => 'required|string',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'string',
        ]);

        $doctor = DoctorProfile::create($validatedData);
        return response()->json(['message' => 'doctor added successfully', 'doctor' => $doctor], 201);
    }

    public function getById($id)
    {
        $doctor = DoctorProfile::with("user")->find($id);

        return response()->json($doctor, 200);
    }

    public function update(Request $request, $id)
    {
        $doctor = DoctorProfile::find($id);

        $validatedData = $request->validate([
            'speciality' => 'string',
            'cost' => 'numeric',
            'governorate' => 'string',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'description' => 'string',
        ]);

        $doctor->update($validatedData);

        return response()->json(['message' => 'Doctor updated successfully', 'doctor' => $doctor], 200);
    }

    public function delete($id)
    {
        $doctor = DoctorProfile::find($id);
        $doctor->delete();
        return response()->json(['message' => 'Doctor deleted successfully'], 200);
    }

    public function search(Request $request)
    {
        $speciality = $request->input('speciality');
        $cost = $request->input('cost');
        $governorate = $request->input('governorate');
        $query = DoctorProfile::query();

        if ($speciality) {
            $query->where('speciality', 'like', '%' . $speciality . '%');
        }
        if ($cost) {
            $query->where('cost', '=', $cost);
        }
        if ($governorate) {
            $query->where('governorate', 'like', '%' . $governorate . '%');
        }
        $doctors = $query->get();

        return response()->json(['doctors' => $doctors], 200);
    }
}
