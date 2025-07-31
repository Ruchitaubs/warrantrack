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
                "code"=> 405,
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 405);
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
            "code"=> 200,
            "status"=> "success",
            "message"=> "Registration successful",
            'user'   => $user,
            'token'  => $token,
        ], 200);
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
                 "code"=> 405,
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 405);
        }

        // Attempt to find the user and check password
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                 "code"=> 405,
                'status'  => 'error',
                'message' => 'Invalid credentials',
            ], 405);
        }

        // Issue token
        $token = $user->createToken('mobile_token')->plainTextToken;

        return response()->json([
            "code"=> 200,
            "status"=> "success",
            "message"=> "Login successful",
            'user'   => $user,
            'token'  => $token,
        ]);
    }

    // POST /api/logout
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            "code" => 200,
    "message"=> "Logged out successfully" ]);
    }
}
