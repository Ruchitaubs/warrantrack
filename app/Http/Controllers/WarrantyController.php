<?php
// app/Http/Controllers/WarrantyController.php

namespace App\Http\Controllers;

use App\Models\Warranty;
use App\Models\ItemType;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    // GET /admin/warranties
    public function index()
    {
        $warranties = Warranty::with('itemType')->latest()->get();
        return view('admin.warranties.index', compact('warranties'));
    }

    // GET /admin/warranties/create
    public function create()
    {
        $itemTypes = ItemType::all();
        return view('admin.warranties.create', compact('itemTypes'));
    }

    // POST /admin/warranties
    public function store(Request $request)
    {
        $data = $request->validate([
            'item_type_id' => 'required|exists:item_types,id',
            'label'        => 'required|string|max:255',
            'months'       => 'required|integer|min:1',
        ]);

        Warranty::create($data);

        return redirect()
            ->route('warranties.index')
            ->with('success', 'Warranty created successfully.');
    }

    // GET /admin/warranties/{warranty}/edit
    public function edit(Warranty $warranty)
    {
        $itemTypes = ItemType::all();
        return view('admin.warranties.edit', compact('warranty','itemTypes'));
    }

    // PUT /admin/warranties/{warranty}
    public function update(Request $request, Warranty $warranty)
    {
        $data = $request->validate([
            'item_type_id' => 'required|exists:item_types,id',
            'label'        => 'required|string|max:255',
            'months'       => 'required|integer|min:1',
        ]);

        $warranty->update($data);

        return redirect()
            ->route('warranties.index')
            ->with('success', 'Warranty updated successfully.');
    }

    // DELETE /admin/warranties/{warranty}
    public function destroy(Warranty $warranty)
    {
        $warranty->delete();

        return redirect()
            ->route('warranties.index')
            ->with('success', 'Warranty deleted successfully.');
    }
}
