<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\ItemType;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // GET /admin/brands
    public function index()
    {
        $brands = Brand::with('itemType')->latest()->get();
        return view('admin.brands.index', compact('brands'));
    }

    // GET /admin/brands/create
    public function create()
    {
        $itemTypes = ItemType::all();
        return view('admin.brands.create', compact('itemTypes'));
    }

    // POST /admin/brands
    public function store(Request $request)
    {
        $data = $request->validate([
            'item_type_id' => 'required|exists:item_types,id',
            'name'         => 'required|string|max:255',
        ]);

        Brand::create($data);

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand created successfully.');
    }

    // GET /admin/brands/{brand}/edit
    public function edit(Brand $brand)
    {
        $itemTypes = ItemType::all();
        return view('admin.brands.edit', compact('brand', 'itemTypes'));
    }

    // PUT /admin/brands/{brand}
    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate([
            'item_type_id' => 'required|exists:item_types,id',
            'name'         => 'required|string|max:255',
        ]);

        $brand->update($data);

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand updated successfully.');
    }

    // DELETE /admin/brands/{brand}
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand deleted successfully.');
    }
}
