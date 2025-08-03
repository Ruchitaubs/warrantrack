<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
            'icon'        => 'nullable|image|max:1024', // e.g., up to 1MB
        ]);

        $data = $request->only('category_id','name');
        if ($request->hasFile('icon')) {
            $data['icon_path'] = $this->saveIcon($request->file('icon'));
        }

        ItemType::create($data);
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
            'icon'        => 'nullable|image|max:1024',
        ]);

        $data = $request->only('category_id','name');
        if ($request->hasFile('icon')) {
            // optional: delete old icon
            if ($item_type->icon_path) {
                $old = str_replace('storage/', '', $item_type->icon_path);
                Storage::disk('public')->delete($old);
            }
            $data['icon_path'] = $this->saveIcon($request->file('icon'));
        }

        $item_type->update($data);

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

    protected function saveIcon(?UploadedFile $file): ?string
    {
        
         if (! $file) {
        return null;
        }

        // Build destination inside public_html/public/storage/app/public/item-type-icons
        $directory = public_path('storage/app/public/item-type-icons');
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
    
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->move($directory, $filename);
    
        // Return the stored relative path for use in <img src="...">
        // e.g., "storage/app/public/item-type-icons/uuid.png"
        return "storage/app/public/item-type-icons/{$filename}";
     
    }
}
