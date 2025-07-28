@extends('admin.layouts.app')

@section('title', 'Edit Warranty')

@section('content')
    <h2 class="text-xl font-bold mb-4">Edit Warranty</h2>

    <form method="POST" action="{{ route('warranties.update', $warranty) }}"
          class="max-w-md bg-white p-6 shadow rounded">
        @csrf @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Item Type</label>
            <select name="item_type_id" required class="w-full border px-3 py-2 rounded">
                <option value="">-- Select Item Type --</option>
                @foreach($itemTypes as $it)
                    <option value="{{ $it->id }}"
                        {{ old('item_type_id', $warranty->item_type_id)==$it->id?'selected':'' }}>
                        {{ $it->name }}
                    </option>
                @endforeach
            </select>
            @error('item_type_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Label</label>
            <input type="text" name="label" required
                   class="w-full border px-3 py-2 rounded"
                   value="{{ old('label', $warranty->label) }}">
            @error('label')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Duration (months)</label>
            <input type="number" name="months" min="1" required
                   class="w-full border px-3 py-2 rounded"
                   value="{{ old('months', $warranty->months) }}">
            @error('months')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Update
        </button>
    </form>
@endsection
