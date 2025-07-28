<?php
// app/Http/Controllers/Api/WarrantyApiController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Warranty;
use Illuminate\Http\Request;

class WarrantyApiController extends Controller
{
    public function index()
    {
        return Warranty::with('itemType')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'item_type_id'=>'required|exists:item_types,id',
            'label'=>'required|string|max:255',
            'months'=>'required|integer|min:1',
        ]);
        $w = Warranty::create($data);
        return response()->json($w, 201);
    }

    public function show(Warranty $warranty)
    {
        return $warranty->load('itemType');
    }

    public function update(Request $request, Warranty $warranty)
    {
        $data = $request->validate([
            'item_type_id'=>'required|exists:item_types,id',
            'label'=>'required|string|max:255',
            'months'=>'required|integer|min:1',
        ]);
        $warranty->update($data);
        return response()->json($warranty);
    }

    public function destroy(Warranty $warranty)
    {
        $warranty->delete();
        return response()->noContent();
    }
}
