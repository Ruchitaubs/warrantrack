@extends('admin.layouts.app')

@section('title', 'Users')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Registered Users</h2>
    </div>

    <table class="w-full bg-white shadow rounded">
        <thead class="bg-gray-200 text-left">
            <tr>
                <th class="p-3">#</th>
                <th class="p-3">Name</th>
                <th class="p-3">Email</th>
                <th class="p-3">Joined</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr class="border-t">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3">{{ $user->name }}</td>
                    <td class="p-3">{{ $user->email }}</td>
                    <td class="p-3">{{ $user->created_at->format('Y-m-d') }}</td>
                    <td class="p-3">
                        <a href="{{ route('users.show', $user) }}"
                           class="text-blue-600 hover:underline">
                            View
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-3 text-center text-gray-500">
                        No users found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
