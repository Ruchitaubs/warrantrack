<?php
// app/Http/Controllers/Api/DropdownController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ItemType;
use App\Models\Brand;
use App\Models\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DropdownController extends Controller
{
    // GET /api/dropdowns/categories
    public function categories()
    {
        $categories = Category::all(['id','name']);

        if ($categories->isEmpty()) {
            return response()->json([
                'code'   => 405,
                'status'  => 'error',
                'message' => 'No categories found.',
            ], 404);
        }
 
        return response()->json([
                'code'=> 200,
                'status'  => 'success',
                'message' => 'success',
                'categories' => $categories
            ], 200);

    }

    // GET /api/dropdowns/items?category_id=#
    public function items(Request $request)
    { 
        // Validate the input
        $validator = Validator::make($request->only('category_id'), [
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                 'code'   => 405,
                 'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 405);
        }

        $items = ItemType::where('category_id', $request->category_id)
                         ->get(['id','name']);


        if ($items->isEmpty()) {
            return response()->json([
                  'code'   => 405,
                 'status'  => 'error',
                'message' => 'No item types found for this category.',
            ], 405);
        }

        return response()->json([
                'code'=> 200,
                'status'  => 'success',
                'message' => 'success',
                'items' => $items
            ], 200);
    }

    // GET /api/dropdowns/brands?item_type_id=#
    public function brands(Request $request)
    {
         $validator = Validator::make($request->only('item_type_id'), [
            'item_type_id' => 'required|exists:item_types,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                  'code'   => 405,
                 'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 405);
        }
        
         $brands = Brand::where('item_type_id', $request->item_type_id)
                       ->get(['id','name']);

        // 3. If none found, return 404
        if ($brands->isEmpty()) {
            return response()->json([
                 'code'   => 405,
                 'status'  => 'error',
                'message' => 'No brands found for the specified item type.',
            ], 405);
        }
 
         return response()->json([
                'code'=> 200,
                'status'  => 'success',
                'message' => 'success',
                'brands' => $brands
            ], 200);
    }

    // GET /api/dropdowns/warranties?item_type_id=#
    public function warranties(Request $request)
    {
        // 1. Validate the input
        $validator = Validator::make($request->only('item_type_id'), [
            'item_type_id' => 'required|exists:item_types,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                 'code'   => 405,
                 'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 405);
        }

        // 2. Fetch warranties for the given item type
        $warranties = Warranty::where('item_type_id', $request->item_type_id)
                              ->get(['id','label','months']);

        // 3. If none found, return 404
        if ($warranties->isEmpty()) {
            return response()->json([
                'code'   => 405,
                 'status'  => 'error',
                'message' => 'No warranties found for the specified item type.',
            ], 405);
        }
  
         return response()->json([
                'code'=> 200,
                'status'  => 'success',
                'message' => 'success',
                'warranties' => $warranties
            ], 200);

    }
}
