<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    // GET /admin/item-types
    public function index()
    {
        $itemTypes = ItemType::with('category')->latest()->get();
        return view('admin.item_types.index', compact('itemTypes'));
    }

    // GET /admin/item-types/create
    public function create()
    {
        $categories = Category::all();
        return view('admin.item_types.create', compact('categories'));
    }

    // POST /admin/item-types
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
        ]);

        ItemType::create($request->only('category_id','name'));

        return redirect()
            ->route('item-types.index')
            ->with('success', 'Item Type created successfully.');
    }

    // GET /admin/item-types/{item_type}/edit
    public function edit(ItemType $item_type)
    {
        $categories = Category::all();
        return view('admin.item_types.edit', [
            'itemType'   => $item_type,
            'categories' => $categories,
        ]);
    }

    // PUT /admin/item-types/{item_type}
    public function update(Request $request, ItemType $item_type)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
        ]);

        $item_type->update($request->only('category_id','name'));

        return redirect()
            ->route('item-types.index')
            ->with('success', 'Item Type updated successfully.');
    }

    // DELETE /admin/item-types/{item_type}
    public function destroy(ItemType $item_type)
    {
        $item_type->delete();

        return redirect()
            ->route('item-types.index')
            ->with('success', 'Item Type deleted successfully.');
    }
}
