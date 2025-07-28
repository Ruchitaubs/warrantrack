<?php
// app/Http/Controllers/Api/AuthController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // POST /api/register
    
    public function register(Request $request)
    {
        // Manual validation so we can customize the JSON error format
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        // Create the user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Issue token
        $token = $user->createToken('mobile_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'user'   => $user,
            'token'  => $token,
        ], 201);
    }


    // POST /api/login
    public function login(Request $request)
    {
        // Manual validation for custom error format
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        // Attempt to find the user and check password
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Issue token
        $token = $user->createToken('mobile_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'user'   => $user,
            'token'  => $token,
        ]);
    }

    // POST /api/logout
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}
