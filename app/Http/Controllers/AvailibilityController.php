<?php

namespace App\Http\Controllers;

use App\Models\Availibility;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AvailibilityController extends Controller
{
    public function index($doctor_id)
    {
        $mytime = Carbon::now();
        $mytime = $mytime->toDateTimeString();
        $availibilities = Availibility::where("doctor_id", $doctor_id)->where("datetime", '>=', $mytime)->orderBy("datetime", 'asc')->get();
        return response()->json($availibilities, 200);
    }

    public function update(Request $request, $id)
    {
        $availibilities = Availibility::find($id);

        $validatedData = $request->validate([
            'datetime' => 'date_format:Y-m-d H:i:s',
        ]);

        $availibilities->update($validatedData);

        return response()->json(['message' => 'Availibility updated successfully', 'availibility' => $availibilities], 200);
    }

    public function delete($id)
    {
        $availibilities = Availibility::find($id);
        $availibilities->delete();
        return response()->json(['message' => 'availibility deleted successfully'], 200);
    }
}
