<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);;
    }

    public function me()
    {
        $authUser = auth('sanctum')->user();
        return response()->json($authUser, 200);
    }

    public function add(Request $request)
    {
        $validateddata = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'role' => 'string',
            'password' => 'required|string|min:8',
        ]);
        $role = $request->input('role', 'user');
        $user = User::create(array_merge(
            $validateddata,
            ['role' => $role],
            ['password' => bcrypt($request->input('password'))]
        ));
        return response()->json(['message' => 'User added successfully', 'user' => $user], 201);
    }
    public function getById($id)
    {
        $user = User::find($id);
        return response()->json(['user' => $user], 200);
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    }
    public function update(Request $request, $id)
    {
        $user = UserProfile::find($id);

        $validatedData = $request->validate([
            'name' => 'string',
            'email' => 'email|unique:users,email' . $user->id,
            'role' => 'string',
            'password' => 'string|min:8',
        ]);

        $user->update($validatedData);

        return response()->json(['message' => 'user updated successfully', 'user' => $user], 200);
    }
}
