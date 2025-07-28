@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('content')
    <h2 class="text-xl font-bold mb-4">Edit Category</h2>

    <form method="POST"
          action="{{ route('categories.update', $category) }}"
          class="max-w-md bg-white p-6 shadow rounded">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Name</label>
            <input type="text"
                   name="name"
                   value="{{ old('name', $category->name) }}"
                   required
                   class="w-full border px-3 py-2 rounded">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Update
        </button>
    </form>
@endsection
