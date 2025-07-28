<?php
// app/Http/Controllers/Api/CategoryApiController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name'=>'required|string|max:255']);
        $category = Category::create($data);
        return response()->json($category, 201);
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate(['name'=>'required|string|max:255']);
        $category->update($data);
        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->noContent();
    }
}
