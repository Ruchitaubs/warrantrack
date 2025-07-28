<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminUserController extends Controller
{
    // GET /admin/users
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    // GET /admin/users/{user}
    public function show(User $user)
    {
        // Eager‑load this user’s appliances and their relations
        $user->load([
            'appliances.category',
            'appliances.itemType',
            'appliances.brand',
            'appliances.modelEntry',
            'appliances.warranty',
        ]);

        return view('admin.users.show', compact('user'));
    }
}
