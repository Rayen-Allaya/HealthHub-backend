<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Availibility;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function create($id)
    {
        $authUser = auth('sanctum')->user()->id;
        $ava = Availibility::where("id", $id)->first();
        $appointment = Appointment::create(["user_id" => $authUser, "doctor_id" => $ava->doctor_id, "datetime" => $ava->datetime]);
        $ava->delete();
        return $appointment;
    }

    public function index()
    {
        $mytime = Carbon::now();
        $mytime = $mytime->toDateTimeString();
        $user = auth('sanctum')->user();
        $appointment = Appointment::where("user_id", $user->id)->with(["doctor", "doctor.doctorProfile"])->where("datetime", ">=", $mytime)->orderBy("datetime", "asc")->get();
        return response()->json($appointment, 200);
    }

    public function history()
    {
        $mytime = Carbon::now();
        $mytime = $mytime->toDateTimeString();
        $user = auth('sanctum')->user();
        $appointment = Appointment::where("user_id", $user->id)->with(["doctor", "doctor.doctorProfile"])->where("datetime", "<", $mytime)->orderBy("datetime", "desc")->get();
        return response()->json($appointment, 200);
    }

    public function update(Request $request, $id)
    {
        $appointments = Appointment::find($id);

        $validatedData = $request->validate([
            'datetime' => 'date_format:Y-m-d H:i:s',
        ]);

        $appointments->update($validatedData);

        return response()->json(['message' => 'appointment updated successfully', 'appointment' => $appointments], 200);
    }

    public function delete($id)
    {
        $appointments = Appointment::find($id);
        $appointments->delete();
        return response()->json(['message' => 'appointment deleted successfully'], 200);
    }
}
