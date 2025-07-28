<?php

namespace App\Http\Controllers;

use App\Models\ModelEntry;
use App\Models\Brand;
use Illuminate\Http\Request;

class ModelEntryController extends Controller
{
    // GET /admin/model-entries
    public function index()
    {
        $models = ModelEntry::with('brand')->latest()->get();
        return view('admin.model_entries.index', compact('models'));
    }

    // GET /admin/model-entries/create
    public function create()
    {
        $brands = Brand::all();
        return view('admin.model_entries.create', compact('brands'));
    }

    // POST /admin/model-entries
    public function store(Request $request)
    {
        $data = $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'name'     => 'required|string|max:255',
        ]);

        ModelEntry::create($data);

        return redirect()
            ->route('model-entries.index')
            ->with('success', 'Model entry added successfully.');
    }

    // GET /admin/model-entries/{modelEntry}/edit
    public function edit(ModelEntry $modelEntry)
    {
        $brands = Brand::all();
        return view('admin.model_entries.edit', compact('modelEntry', 'brands'));
    }

    // PUT /admin/model-entries/{modelEntry}
    public function update(Request $request, ModelEntry $modelEntry)
    {
        $data = $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'name'     => 'required|string|max:255',
        ]);

        $modelEntry->update($data);

        return redirect()
            ->route('model-entries.index')
            ->with('success', 'Model entry updated successfully.');
    }

    // DELETE /admin/model-entries/{modelEntry}
    public function destroy(ModelEntry $modelEntry)
    {
        $modelEntry->delete();

        return redirect()
            ->route('model-entries.index')
            ->with('success', 'Model entry deleted successfully.');
    }
}
