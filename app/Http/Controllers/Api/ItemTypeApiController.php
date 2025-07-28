<?php
// app/Http/Controllers/Api/ItemTypeApiController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ItemType;
use Illuminate\Http\Request;

class ItemTypeApiController extends Controller
{
    public function index()
    {
        return ItemType::with('category')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id'=>'required|exists:categories,id',
            'name'=>'required|string|max:255',
        ]);
        $item = ItemType::create($data);
        return response()->json($item, 201);
    }

    public function show(ItemType $itemType)
    {
        return $itemType->load('category');
    }

    public function update(Request $request, ItemType $itemType)
    {
        $data = $request->validate([
            'category_id'=>'required|exists:categories,id',
            'name'=>'required|string|max:255',
        ]);
        $itemType->update($data);
        return response()->json($itemType);
    }

    public function destroy(ItemType $itemType)
    {
        $itemType->delete();
        return response()->noContent();
    }
}
