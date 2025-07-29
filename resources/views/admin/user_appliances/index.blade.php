@extends('admin.layouts.app')

@section('title', 'User Appliances')

@section('content')
    <h2 class="text-xl font-bold mb-4">User Appliances</h2>

    <table class="w-full bg-white shadow rounded">
        <thead class="bg-gray-200 text-left">
            <tr>
                <th class="p-3">#</th>
                <th class="p-3">User</th>
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
            @forelse($userAppliances as $ua)
                <tr class="border-t">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3">{{ $ua->user->name }}</td>
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
                    <td colspan="10" class="p-3 text-center text-gray-500">
                        No appliances found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
