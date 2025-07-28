@extends('admin.layouts.app')

@section('title', 'Add Brand')

@section('content')
    <h2 class="text-xl font-bold mb-4">Add Brand</h2>

    <form method="POST" action="{{ route('brands.store') }}" class="max-w-md bg-white p-6 shadow rounded">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Item Type</label>
            <select name="item_type_id" required class="w-full border px-3 py-2 rounded">
                <option value="">-- Select Item Type --</option>
                @foreach($itemTypes as $it)
                    <option value="{{ $it->id }}" {{ old('item_type_id')==$it->id ? 'selected':'' }}>
                        {{ $it->name }}
                    </option>
                @endforeach
            </select>
            @error('item_type_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Brand Name</label>
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
