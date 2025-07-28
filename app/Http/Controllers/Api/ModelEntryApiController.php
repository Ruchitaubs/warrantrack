<?php
// app/Http/Controllers/Api/ModelEntryApiController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ModelEntry;
use Illuminate\Http\Request;

class ModelEntryApiController extends Controller
{
    public function index()
    {
        return ModelEntry::with('brand')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'brand_id'=>'required|exists:brands,id',
            'name'=>'required|string|max:255',
        ]);
        $model = ModelEntry::create($data);
        return response()->json($model, 201);
    }

    public function show(ModelEntry $modelEntry)
    {
        return $modelEntry->load('brand');
    }

    public function update(Request $request, ModelEntry $modelEntry)
    {
        $data = $request->validate([
            'brand_id'=>'required|exists:brands,id',
            'name'=>'required|string|max:255',
        ]);
        $modelEntry->update($data);
        return response()->json($modelEntry);
    }

    public function destroy(ModelEntry $modelEntry)
    {
        $modelEntry->delete();
        return response()->noContent();
    }
}
