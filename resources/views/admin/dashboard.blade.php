@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="{{ route('categories.index') }}" class="block bg-white p-6 shadow rounded hover:bg-gray-100 transition">
            <h3 class="font-semibold mb-1">Categories</h3>
            <p>Manage Categories</p>
        </a>
        <a href="{{ route('item-types.index') }}" class="block bg-white p-6 shadow rounded hover:bg-gray-100 transition">
            <h3 class="font-semibold mb-1">Item Types</h3>
            <p>Manage Item Types</p>
        </a>
        <a href="{{ route('brands.index') }}" class="block bg-white p-6 shadow rounded hover:bg-gray-100 transition">
            <h3 class="font-semibold mb-1">Brands</h3>
            <p>Manage Brands</p>
        </a>
        <a href="{{ route('model-entries.index') }}" class="block bg-white p-6 shadow rounded hover:bg-gray-100 transition">
            <h3 class="font-semibold mb-1">Models</h3>
            <p>Manage Model Entries</p>
        </a>
        <a href="{{ route('warranties.index') }}" class="block bg-white p-6 shadow rounded hover:bg-gray-100 transition">
            <h3 class="font-semibold mb-1">Warranties</h3>
            <p>Manage Warranties</p>
        </a>
        <a href="{{ route('users.index') }}" class="block bg-white p-6 shadow rounded hover:bg-gray-100 transition">
            <h3 class="font-semibold mb-1">Users</h3>
            <p>View Registered Users</p>
        </a>

        <a href="{{ route('user-appliances.index') }}" class="block bg-white p-6 shadow rounded hover:bg-gray-100 transition">
            <h3 class="font-semibold mb-1">User Appliances</h3>
            <p>View User Appliances</p>
        </a>
    </div>
@endsection
