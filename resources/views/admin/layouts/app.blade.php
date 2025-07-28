<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - WarranTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">
    <nav class="bg-white shadow p-4 mb-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/admin/dashboard') }}" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="WarranTrack" class="h-8 mr-2">
                <span class="text-xl font-bold">WarranTrack Admin</span>
            </a>
            @if(session('admin_logged_in'))
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="text-red-600 font-semibold">Logout</button>
                </form>
            @endif
        </div>
    </nav>
    
    <div class="container mx-auto px-4 flex">
        @if(session('admin_logged_in'))
        <aside class="w-64 mr-6">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="block px-3 py-2 rounded hover:bg-gray-200">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}"
                       class="block px-3 py-2 rounded hover:bg-gray-200">
                        Categories
                    </a>
                </li>
                <li>
                    <a href="{{ route('item-types.index') }}"
                       class="block px-3 py-2 rounded hover:bg-gray-200">
                        Item Types
                    </a>
                </li>
                <li>
                    <a href="{{ route('brands.index') }}"
                       class="block px-3 py-2 rounded hover:bg-gray-200">
                        Brands
                    </a>
                </li>
                <li>
                    <a href="{{ route('model-entries.index') }}"
                       class="block px-3 py-2 rounded hover:bg-gray-200">
                        Models
                    </a>
                </li>
                <li>
                    <a href="{{ route('warranties.index') }}"
                       class="block px-3 py-2 rounded hover:bg-gray-200">
                        Warranties
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}"
                       class="block px-3 py-2 rounded hover:bg-gray-200">
                        Users
                    </a>
                </li>
                <li>
                    <a href="{{ route('user-appliances.index') }}"
                       class="block px-3 py-2 rounded hover:bg-gray-200">
                        User Appliances
                    </a>
                </li>
            </ul>
        </aside>
        @endif

        <main class="flex-1">
            @yield('content')
        </main>
    </div>
</body>
</html>
