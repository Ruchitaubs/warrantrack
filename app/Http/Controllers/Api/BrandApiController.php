<?php
// app/Http/Controllers/Api/BrandApiController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandApiController extends Controller
{
    public function index()
    {
        return Brand::with('itemType')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'item_type_id'=>'required|exists:item_types,id',
            'name'=>'required|string|max:255',
        ]);
        $brand = Brand::create($data);
        return response()->json($brand, 201);
    }

    public function show(Brand $brand)
    {
        return $brand->load('itemType');
    }

    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate([
            'item_type_id'=>'required|exists:item_types,id',
            'name'=>'required|string|max:255',
        ]);
        $brand->update($data);
        return response()->json($brand);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return response()->noContent();
    }
}
