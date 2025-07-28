@extends('admin.layouts.app')

@section('title', 'Models')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Model Entries</h2>
        <a href="{{ route('model-entries.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Add Model
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
                <th class="p-3">Model Name</th>
                <th class="p-3">Brand</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($models as $model)
                <tr class="border-t">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3">{{ $model->name }}</td>
                    <td class="p-3">{{ $model->brand->name }}</td>
                    <td class="p-3">
                        <a href="{{ route('model-entries.edit', $model) }}" class="text-blue-600 mr-2">Edit</a>
                        <form method="POST" action="{{ route('model-entries.destroy', $model) }}" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this model?')" class="text-red-600">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-3 text-center text-gray-500">No models found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
