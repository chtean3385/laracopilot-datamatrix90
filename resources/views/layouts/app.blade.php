<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wildlife Photography')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-gradient-to-r from-slate-800 to-slate-900 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tight hover:text-gray-300 transition-colors duration-300">
                        🦁 Wildlife Photography
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="hover:text-gray-300 transition-colors duration-300 {{ request()->routeIs('home') ? 'border-b-2 border-white' : '' }}">Home</a>
                    <a href="{{ route('gallery') }}" class="hover:text-gray-300 transition-colors duration-300 {{ request()->routeIs('gallery') ? 'border-b-2 border-white' : '' }}">Gallery</a>
                    <a href="{{ route('events') }}" class="hover:text-gray-300 transition-colors duration-300 {{ request()->routeIs('events') ? 'border-b-2 border-white' : '' }}">Events & Expeditions</a>
                    <a href="{{ route('about') }}" class="hover:text-gray-300 transition-colors duration-300 {{ request()->routeIs('about') ? 'border-b-2 border-white' : '' }}">About</a>
                    <a href="{{ route('contact') }}" class="hover:text-gray-300 transition-colors duration-300 {{ request()->routeIs('contact') ? 'border-b-2 border-white' : '' }}">Contact</a>
                    <a href="{{ route('admin.login') }}" class="bg-white text-slate-800 px-4 py-1 rounded hover:bg-gray-200 transition-colors duration-300">Admin</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden" x-data="{ open: false }">
                    <button @click="open = !open" class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path x-show="open" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    
                    <!-- Mobile Menu -->
                    <div x-show="open" x-cloak @click.away="open = false" class="absolute top-16 left-0 right-0 bg-slate-800 shadow-lg">
                        <div class="flex flex-col space-y-4 p-4">
                            <a href="{{ route('home') }}" class="hover:text-gray-300 transition-colors duration-300">Home</a>
                            <a href="{{ route('gallery') }}" class="hover:text-gray-300 transition-colors duration-300">Gallery</a>
                            <a href="{{ route('events') }}" class="hover:text-gray-300 transition-colors duration-300">Events & Expeditions</a>
                            <a href="{{ route('about') }}" class="hover:text-gray-300 transition-colors duration-300">About</a>
                            <a href="{{ route('contact') }}" class="hover:text-gray-300 transition-colors duration-300">Contact</a>
                            <a href="{{ route('admin.login') }}" class="bg-white text-slate-800 px-4 py-2 rounded text-center hover:bg-gray-200 transition-colors duration-300">Admin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer (Include Partial) -->
    @include('partials.footer')

    @stack('scripts')
</body>
</html>