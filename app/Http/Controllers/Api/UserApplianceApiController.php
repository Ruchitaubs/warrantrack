<?php
// app/Http/Controllers/Api/UserApplianceApiController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserAppliance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserApplianceApiController extends Controller
{
    public function index(Request $r)
    {
        $list = UserAppliance::with([
                    'category',
                    'itemType',
                    'brand',
                    'modelEntry',
                    'warranty',
                ])
                ->where('user_id', $r->user()->id)
                ->get();

        // 2. If empty, return 404 with error message
        if ($list->isEmpty()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'No appliances found for this user.',
            ], 404);
        }

        // 3. Otherwise return success payload
        return   $list;


    }

   public function store(Request $r)
    {
        // 1. Validate input
        $validator = Validator::make($r->all(), [
            'category_id'       => 'required|exists:categories,id',
            'item_type_id'      => 'required|exists:item_types,id',
            'brand_id'          => 'required|exists:brands,id',
            'model_entry_id'    => 'required|exists:model_entries,id',
            'warranty_id'       => 'required|exists:warranties,id',
            'purchase_date'     => 'required|date',
             'service_interval_months'=> 'nullable|in:3,6,12',    // only those options
            'next_service_date' => 'nullable|date',
            'location'          => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        // 2. Create the record
        $data = $validator->validated();
        $data['user_id'] = $r->user()->id;

        $ua = UserAppliance::create($data);

        // 3. Return success
        return  $ua;
    }
}
