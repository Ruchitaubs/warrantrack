@extends('admin.layouts.app')

@section('title', 'Admin Login')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 shadow-md rounded-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Admin Login</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Email</label>
            <input type="email" name="email" required class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-6">
            <label class="block text-sm font-semibold mb-1">Password</label>
            <input type="password" name="password" required class="w-full border rounded px-3 py-2">
        </div>
        <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
            Login
        </button>
    </form>
</div>
@endsection
