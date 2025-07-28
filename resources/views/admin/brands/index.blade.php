@extends('admin.layouts.app')

@section('title', 'Brands')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Brands</h2>
        <a href="{{ route('brands.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Add Brand
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-3">#</th>
                <th class="p-3">Name</th>
                <th class="p-3">Item Type</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($brands as $brand)
                <tr class="border-t">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3">{{ $brand->name }}</td>
                    <td class="p-3">{{ $brand->itemType->name }}</td>
                    <td class="p-3">
                        <a href="{{ route('brands.edit', $brand) }}" class="text-blue-600 mr-2">Edit</a>
                        <form method="POST" action="{{ route('brands.destroy', $brand) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this brand?')" class="text-red-600">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-3 text-center text-gray-500">
                        No brands found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
