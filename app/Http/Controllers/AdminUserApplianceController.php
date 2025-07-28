<?php

namespace App\Http\Controllers;

use App\Models\UserAppliance;
use Illuminate\Http\Request;

class AdminUserApplianceController extends Controller
{
    /**
     * Display a listing of all user‑added appliances.
     */
    public function index()
    {
        // eager‑load all relations
        $userAppliances = UserAppliance::with([
            'user',
            'category',
            'itemType',
            'brand',
            'modelEntry',
            'warranty',
        ])->latest()->get();

        return view('admin.user_appliances.index', compact('userAppliances'));
    }
}
