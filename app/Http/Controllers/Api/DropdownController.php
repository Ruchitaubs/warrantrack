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
        $categories = Category::all(['id', 'name']);

        if ($categories->isEmpty()) {
            return response()->json([
                'code'    => 404,
                'status'  => 'error',
                'message' => 'No categories found.',
            ], 404);
        }

        return response()->json([
            'code'       => 200,
            'status'     => 'success',
            'message'    => 'success',
            'categories' => $categories, // each has id and name
        ], 200);
    }

    // GET /api/dropdowns/items?category_id=#
    public function items(Request $request)
    {
        $validator = Validator::make($request->only('category_id'), [
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code'    => 422,
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $items = ItemType::where('category_id', $request->category_id)
                         ->get(['id', 'name' , 'icon_path']);

        if ($items->isEmpty()) {
            return response()->json([
                'code'    => 404,
                'status'  => 'error',
                'message' => 'No item types found for this category.',
            ], 404);
        }

        return response()->json([
            'code'    => 200,
            'status'  => 'success',
            'message' => 'success',
            'items'   => $items, // each has id and name
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
                'code'    => 422,
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $brands = Brand::where('item_type_id', $request->item_type_id)
                       ->get(['id', 'name']);

        if ($brands->isEmpty()) {
            return response()->json([
                'code'    => 404,
                'status'  => 'error',
                'message' => 'No brands found for the specified item type.',
            ], 404);
        }

        return response()->json([
            'code'   => 200,
            'status' => 'success',
            'message'=> 'success',
            'brands' => $brands, // each has id and name
        ], 200);
    }

    // GET /api/dropdowns/warranties?item_type_id=#
    public function warranties(Request $request)
    {
        $validator = Validator::make($request->only('item_type_id'), [
            'item_type_id' => 'required|exists:item_types,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code'    => 422,
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $warranties = Warranty::where('item_type_id', $request->item_type_id)
                              ->get(['id', 'label', 'months']);

        if ($warranties->isEmpty()) {
            return response()->json([
                'code'    => 404,
                'status'  => 'error',
                'message' => 'No warranties found for the specified item type.',
            ], 404);
        }

        return response()->json([
            'code'        => 200,
            'status'      => 'success',
            'message'     => 'success',
            'warranties'  => $warranties, // each has id, label, months
        ], 200);
    }
}
