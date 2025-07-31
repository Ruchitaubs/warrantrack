<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>WarranTrack • Warranty & Service Manager</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* subtle material elevation shadows */
    .elevation-1 { box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); }
    .elevation-2 { box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); }
    .gradient-bg {
      background: linear-gradient(135deg,#6366f1 0%,#ec4899 80%);
    }
  </style>
</head>
<body class="antialiased bg-gray-50 text-gray-900">
  <header class="max-w-7xl mx-auto px-6 py-8 flex flex-col md:flex-row items-center justify-between">
    <div class="flex items-center gap-3">
      <div class="rounded-full bg-gradient-to-r from-indigo-500 to-pink-500 p-2">
        <div class="bg-white rounded-full w-10 h-10 flex items-center justify-center font-bold text-indigo-600">W</div>
      </div>
      <div>
        <h1 class="text-2xl font-semibold">WarranTrack</h1>
        <p class="text-sm text-gray-600">Your Warranty. Our Guarantee.</p>
      </div>
    </div>
    <div class="mt-4 md:mt-0 flex gap-4">
      <a href="{{ route('admin.login') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-700 transition">Admin</a>
      <a href="#download" class="px-4 py-2 border border-indigo-600 text-indigo-600 rounded-md hover:bg-indigo-50 transition">Get App</a>
    </div>
  </header>

  <main class="relative">
    <section class="px-6 py-16 bg-white">
      <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
          <h2 class="text-4xl font-bold leading-tight">Simplify Warranty & Service Tracking</h2>
          <p class="text-gray-700 leading-relaxed">
            WarranTrack helps you organize, monitor, and renew warranties for all your appliances in one place. Add devices, get reminders for renewals and service, and never lose track of expiration dates again.
          </p>
          <div class="flex flex-col sm:flex-row gap-4">
            <a href="#download" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-indigo-500 to-pink-500 text-white font-semibold rounded shadow hover:opacity-95 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v4a1 1 0 001 1h3m10-6h3a1 1 0 011 1v4m-5 6v4a1 1 0 001 1h3m-10-6H6a1 1 0 00-1 1v4m4-14h6m-6 0a2 2 0 00-2 2v2h10V5a2 2 0 00-2-2m0 0h-4" />
              </svg>
              Get Started
            </a>
            <a href="#features" class="inline-flex items-center gap-2 px-6 py-3 border border-indigo-500 text-indigo-600 font-semibold rounded hover:bg-indigo-50 transition">
              Learn More
            </a>
          </div>
        </div>
        <div class="relative">
          <div class="rounded-2xl elevation-2 overflow-hidden">
            <!-- Placeholder illustration -->
            <img src="https://via.placeholder.com/600x400?text=WarranTrack+App" alt="App preview" class="w-full block">
          </div>
        </div>
      </div>
    </section>

    <section id="features" class="px-6 py-16 bg-gray-50">
      <div class="max-w-5xl mx-auto text-center mb-12">
        <h3 class="text-3xl font-bold">Why WarranTrack?</h3>
        <p class="text-gray-600 mt-2">All your appliance warranties, service reminders, and device summaries—intuitively organized.</p>
      </div>
      <div class="max-w-6xl mx-auto grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="bg-white rounded-lg p-6 elevation-1">
          <div class="flex items-center mb-4">
            <div class="p-3 bg-indigo-100 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4 -4" />
              </svg>
            </div>
            <h4 class="ml-3 font-semibold">Centralized Tracking</h4>
          </div>
          <p class="text-gray-600 text-sm">All appliances, warranties, and service dates in one dashboard.</p>
        </div>
        <div class="bg-white rounded-lg p-6 elevation-1">
          <div class="flex items-center mb-4">
            <div class="p-3 bg-pink-100 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20h.01" />
              </svg>
            </div>
            <h4 class="ml-3 font-semibold">Renewal Reminders</h4>
          </div>
          <p class="text-gray-600 text-sm">Get notified when warranties are about to expire or recently expired.</p>
        </div>
        <div class="bg-white rounded-lg p-6 elevation-1">
          <div class="flex items-center mb-4">
            <div class="p-3 bg-green-100 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </div>
            <h4 class="ml-3 font-semibold">Service Scheduling</h4>
          </div>
          <p class="text-gray-600 text-sm">Set service intervals and never miss maintenance windows.</p>
        </div>
        <div class="bg-white rounded-lg p-6 elevation-1">
          <div class="flex items-center mb-4">
            <div class="p-3 bg-yellow-100 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 11h18M3 15h18" />
              </svg>
            </div>
            <h4 class="ml-3 font-semibold">User Friendly</h4>
          </div>
          <p class="text-gray-600 text-sm">Simple interface optimized for mobile and web.</p>
        </div>
      </div>
    </section>

    <section id="download" class="px-6 py-20">
      <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-10 items-center">
        <div>
          <h2 class="text-3xl font-bold mb-4">Download the App</h2>
          <p class="text-gray-700 mb-6">
            Get full access to your appliance warranty dashboard on the go. Available for Android and iOS. Secure login, offline caching, and timely reminders—designed for busy households.
          </p>
          <div class="flex flex-col sm:flex-row gap-4">
            <a href="#" class="inline-flex items-center gap-3 px-5 py-3 bg-black text-white rounded-lg shadow hover:opacity-90 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C8.134 2 5 5.134 5 9c0 3.866 3.134 7 7 7s7-3.134 7-7c0-3.866-3.134-7-7-7zm0 12c-2.761 0-5-2.239-5-5 0-.823.201-1.598.555-2.286l6.731 6.731A4.958 4.958 0 0112 14zm4.445-7.286A4.958 4.958 0 0117 9c0 2.761-2.239 5-5 5a4.958 4.958 0 01-2.445-.714l6.89-6.89z"/>
              </svg>
              <div class="text-left">
                <div class="text-xs uppercase">Download on</div>
                <div class="font-semibold">Google Play</div>
              </div>
            </a>
            <a href="#" class="inline-flex items-center gap-3 px-5 py-3 bg-gray-900 text-white rounded-lg shadow hover:opacity-90 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                <path d="M16.365 1.43a4.968 4.968 0 00-3.842 1.848 4.997 4.997 0 00-1.01 3.946c.09.58.188 1.195-.053 1.824-.256.665-.809 1.41-1.524 1.942-.716.532-1.556.793-2.334.793-.364 0-.726-.047-1.083-.14A4.999 4.999 0 002.3 11.6c0-2.47 1.415-4.698 3.741-5.906C7.97 4.12 9.987 3.5 12.13 3.5c1.16 0 2.36.316 3.578.944.782.4 1.604.938 2.438 1.61z"/>
                <path d="M18.063 8.528c.486 1.29.107 2.852-.93 3.846-.918.879-2.266 1.32-3.626 1.32-.56 0-1.126-.068-1.692-.202a8.212 8.212 0 00-1.587-.257c-.44 0-.883.034-1.32.1-.633.1-1.27.3-1.865.537-.785.318-1.582.436-2.383.423-.042 0-.083 0-.125-.002a6.03 6.03 0 01-.638-.04 5.007 5.007 0 00-.166-9.9c.51-.14 1.04-.215 1.573-.215.495 0 .99.066 1.473.2.962.304 1.914.828 2.838 1.571 1.234 1 2.407 2.484 3.047 4.076z"/>
              </svg>
              <div class="text-left">
                <div class="text-xs uppercase">Download on</div>
                <div class="font-semibold">App Store</div>
              </div>
            </a>
          </div>
        </div>
        <div class="relative">
          <div class="bg-gradient-to-r from-indigo-500 to-pink-500 rounded-2xl p-1">
            <div class="bg-white rounded-xl p-6">
              <h4 class="font-semibold mb-2">Quick Overview</h4>
              <div class="flex gap-4">
                <div class="flex-1 bg-indigo-50 rounded-lg p-4 text-center">
                  <div class="text-sm font-semibold text-gray-600">Devices Added</div>
                  <div class="text-2xl font-bold">12</div>
                </div>
                <div class="flex-1 bg-pink-50 rounded-lg p-4 text-center">
                  <div class="text-sm font-semibold text-gray-600">Out of Warranty</div>
                  <div class="text-2xl font-bold">2</div>
                </div>
                <div class="flex-1 bg-yellow-50 rounded-lg p-4 text-center">
                  <div class="text-sm font-semibold text-gray-600">Due for Renewal</div>
                  <div class="text-2xl font-bold">1</div>
                </div>
              </div>
              <div class="mt-4">
                <div class="text-sm text-gray-500">Reminders</div>
                <div class="mt-2 bg-orange-100 border-l-4 border-orange-500 p-3 rounded flex items-center">
                  <div class="flex-1">
                    <div class="font-semibold">Extend warranty for Dishwasher</div>
                    <div class="text-xs text-gray-600">Expires on Oct 2, 2025</div>
                  </div>
                  <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20h.01" />
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="bg-white mt-16 py-12">
      <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div>
          <h5 class="font-bold mb-2">About WarranTrack</h5>
          <p class="text-gray-600 text-sm">
            A lightweight warranty & service tracker that keeps all your appliances organized. Add devices, get renewal alerts, schedule service, and view everything from one dashboard.
          </p>
        </div>
        <div>
          <h5 class="font-bold mb-2">Links</h5>
          <ul class="space-y-1 text-sm">
            <li><a href="{{ route('admin.login') }}" class="hover:underline">Admin</a></li>
            <li><a href="#features" class="hover:underline">Andriod Download</a></li>
            <li><a href="#download" class="hover:underline">iOS Download</a></li>
          </ul>
        </div>
        <div>
          <h5 class="font-bold mb-2">Contact</h5>
          <p class="text-sm text-gray-600">support@warrantrack.in</p>
          <p class="text-sm text-gray-600 mt-1">&copy; {{ date('Y') }} WarranTrack. All rights reserved.</p>
        </div>
      </div>
    </footer>
  </main>
</body>
</html>
