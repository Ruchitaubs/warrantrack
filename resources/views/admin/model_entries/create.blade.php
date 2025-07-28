@extends('admin.layouts.app')

@section('title', 'Add Model')

@section('content')
    <h2 class="text-xl font-bold mb-4">Add Model Entry</h2>

    <form method="POST" action="{{ route('model-entries.store') }}" class="max-w-md bg-white p-6 shadow rounded">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Brand</label>
            <select name="brand_id" required class="w-full border px-3 py-2 rounded">
                <option value="">-- Select Brand --</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brand_id')==$brand->id ? 'selected':'' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
            @error('brand_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Model Name</label>
            <input type="text" name="name" required
                   class="w-full border px-3 py-2 rounded"
                   value="{{ old('name') }}">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Save
        </button>
    </form>
@endsection
