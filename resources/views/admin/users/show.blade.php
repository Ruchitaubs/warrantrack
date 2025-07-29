@extends('admin.layouts.app')

@section('title', 'User Details')

@section('content')
    <a href="{{ route('users.index') }}"
       class="inline-block mb-4 text-blue-600 hover:underline">&larr; Back to Users</a>

    <div class="bg-white p-6 shadow rounded mb-6">
        <h2 class="text-2xl font-bold mb-2">User Details</h2>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Joined:</strong> {{ $user->created_at->format('Y-m-d H:i') }}</p>
    </div>

    <h3 class="text-xl font-bold mb-3">Appliances ({{ $user->appliances->count() }})</h3>

    <table class="w-full bg-white shadow rounded">
        <thead class="bg-gray-200 text-left">
            <tr>
                <th class="p-3">#</th>
                <th class="p-3">Category</th>
                <th class="p-3">Item Type</th>
                <th class="p-3">Brand</th>
                <th class="p-3">Model</th>
                <th class="p-3">Warranty</th>
                <th class="p-3">Purchased</th>
                <th class="p-3">Interval (months)</th>
                <th class="p-3">Next Service</th>
                <th class="p-3">Location</th>
            </tr>
        </thead>
        <tbody>
            @forelse($user->appliances as $ua)
                <tr class="border-t">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3">{{ $ua->category->name }}</td>
                    <td class="p-3">{{ $ua->itemType->name }}</td>
                    <td class="p-3">{{ $ua->brand->name }}</td>
                    <td class="p-3">{{ $ua->modelEntry->name }}</td>
                    <td class="p-3">{{ $ua->warranty->label }}</td>
                    <td class="p-3">{{ $ua->purchase_date }}</td>
                    <td class="p-3">
                        {{ $ua->service_interval_months ?? '—' }} months
                    </td>
                    <td class="p-3">{{ $ua->next_service_date ?? '—' }}</td>
                    <td class="p-3">{{ $ua->location ?? '—' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="p-3 text-center text-gray-500">
                        This user has no appliances.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
