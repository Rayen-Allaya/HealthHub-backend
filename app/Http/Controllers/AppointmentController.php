<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointment = Appointment::all();
        return $appointment;        
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

    public function delete($id){
        $appointments = Appointment::find($id);
        $appointments->delete();
        return response()->json(['message' => 'appointment deleted successfully'], 200);
    }
}
