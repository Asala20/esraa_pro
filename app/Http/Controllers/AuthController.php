<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){

    $request->validate([
        'email' => 'required|string|unique:users,email',
        'password' => 'required|string',
    ]);


    $user = Admin::where('email', $request->email)->first();
    
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Invalid credentials',
            'user' => $user,
        ], 401);
    }

    $token = $user->createToken('token-name')->plainTextToken;

    $response = [
        'status' => 'success',
        'message' => 'You logged in successfully!',
        'data' => [
            'token' => $token,
            'user' => $user,
        ],
    ];

    return response()->json($response , 201);
}

public function logout(Request $request) {
    $request->user()->tokens()->delete();
    return response()->json([
        'status' => 'success',
        'message' => 'You logged out successfully!',
    ], 201);
}

}