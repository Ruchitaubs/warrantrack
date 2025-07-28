@extends('admin.layouts.app')

@section('title', 'Add Category')

@section('content')
    <h2 class="text-xl font-bold mb-4">Add Category</h2>

    <form method="POST" action="{{ route('categories.store') }}"
          class="max-w-md bg-white p-6 shadow rounded">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Name</label>
            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   required
                   class="w-full border px-3 py-2 rounded">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Save
        </button>
    </form>
@endsection
