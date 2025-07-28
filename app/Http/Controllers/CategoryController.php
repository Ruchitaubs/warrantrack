<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // GET /admin/categories
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    // GET /admin/categories/create
    public function create()
    {
        return view('admin.categories.create');
    }

    // POST /admin/categories
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create(['name' => $request->name]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    // GET /admin/categories/{category}/edit
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // PUT /admin/categories/{category}
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update(['name' => $request->name]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    // DELETE /admin/categories/{category}
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
