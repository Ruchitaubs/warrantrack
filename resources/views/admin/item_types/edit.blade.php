@extends('admin.layouts.app')

@section('title', 'Edit Item Type')

@section('content')
    <h2 class="text-xl font-bold mb-4">Edit Item Type</h2>

    <form method="POST" action="{{ route('item-types.update', $itemType) }}"
          class="max-w-md bg-white p-6 shadow rounded">
        @csrf @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Category</label>
            <select name="category_id" required class="w-full border px-3 py-2 rounded">
                <option value="">-- Select Category --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ old('category_id', $itemType->category_id)==$cat->id ? 'selected':'' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Name</label>
            <input type="text" name="name" required class="w-full border px-3 py-2 rounded"
                   value="{{ old('name', $itemType->name) }}">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Update
        </button>
    </form>
@endsection
