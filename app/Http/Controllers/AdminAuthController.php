<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    // Show the login form (GET /admin/login)
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Handle the login form submission (POST /admin/login)
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // For demo: hard‑coded admin credentials.
        // In production you might use an Admin model or env vars.
        $adminEmail    = 'admin@example.com';
        $adminPassword = 'password123'; // or Hash::make('password123')

        if ($data['email'] === $adminEmail && $data['password'] === $adminPassword) {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // Logout (POST /admin/logout)
    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    }
}
