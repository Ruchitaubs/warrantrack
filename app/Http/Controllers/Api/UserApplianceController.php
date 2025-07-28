<?php
// app/Http/Controllers/Api/UserApplianceController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserAppliance;
use Illuminate\Http\Request;

class UserApplianceController extends Controller
{
    // GET /api/appliances
    public function index(Request $request)
    {
        $list = UserAppliance::with([
                    'category',
                    'itemType',
                    'brand',
                    'modelEntry',
                    'warranty'
                ])
                ->where('user_id', $request->user()->id)
                ->get();

        return response()->json($list);
    }

    // POST /api/appliances
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id'      => 'required|exists:categories,id',
            'item_type_id'     => 'required|exists:item_types,id',
            'brand_id'         => 'required|exists:brands,id',
            'model_entry_id'   => 'required|exists:model_entries,id',
            'warranty_id'      => 'required|exists:warranties,id',
            'purchase_date'    => 'required|date',
            'next_service_date'=> 'nullable|date',
            'location'         => 'nullable|string|max:255',
        ]);

        $data['user_id'] = $request->user()->id;

        $appliance = UserAppliance::create($data);

        return response()->json($appliance, 201);
    }
}
