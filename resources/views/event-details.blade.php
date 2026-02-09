@extends('layouts.app')

@section('title', $event->title . ' - Wildlife Photography')

@section('content')
<!-- Hero Section with Event Image -->
<div class="relative h-96 bg-gradient-to-r from-slate-800 to-slate-900">
    @if($event->image_url)
        <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="absolute inset-0 w-full h-full object-cover opacity-50">
    @endif
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-5xl font-bold mb-4">{{ $event->title }}</h1>
            <div class="flex items-center space-x-6 text-lg">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                    {{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y') }}
                </div>
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                    {{ $event->location }}
                </div>
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                    </svg>
                    {{ $event->max_participants }} spots
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Event Details Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">About This Event</h2>
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($event->description)) !!}
                </div>

                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">What to Expect</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">Expert guidance from professional wildlife photographers</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">Access to exclusive wildlife locations</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">Small group sizes for personalized attention</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">All necessary photography equipment recommendations</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Registration Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg shadow-lg p-8 text-white sticky top-8">
                <h3 class="text-2xl font-bold mb-6">Register Now</h3>
                
                <div class="space-y-4 mb-8">
                    <div class="flex items-center justify-between pb-4 border-b border-blue-500">
                        <span class="text-blue-200">Price</span>
                        <span class="text-2xl font-bold">${{ number_format($event->price, 2) }}</span>
                    </div>
                    <div class="flex items-center justify-between pb-4 border-b border-blue-500">
                        <span class="text-blue-200">Available Spots</span>
                        <span class="text-xl font-bold">{{ $event->max_participants }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-blue-200">Date</span>
                        <span class="font-semibold">{{ \Carbon\Carbon::parse($event->event_date)->format('M j, Y') }}</span>
                    </div>
                </div>

                @if(session('success'))
                    <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                        <p class="font-semibold">{{ session('success') }}</p>
                    </div>
                @endif

                <form action="{{ route('events.register', $event->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold mb-2">Full Name *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-2 rounded-lg text-gray-800 focus:ring-2 focus:ring-blue-300 @error('name') border-red-500 @enderror"
                               placeholder="John Doe">
                        @error('name')
                            <span class="text-red-200 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-2 rounded-lg text-gray-800 focus:ring-2 focus:ring-blue-300 @error('email') border-red-500 @enderror"
                               placeholder="john@example.com">
                        @error('email')
                            <span class="text-red-200 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Phone *</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" required
                               class="w-full px-4 py-2 rounded-lg text-gray-800 focus:ring-2 focus:ring-blue-300 @error('phone') border-red-500 @enderror"
                               placeholder="+1 (555) 123-4567">
                        @error('phone')
                            <span class="text-red-200 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" 
                            class="w-full bg-white text-blue-700 font-bold py-3 px-6 rounded-lg hover:bg-blue-50 transition-colors duration-300 shadow-lg">
                        Reserve Your Spot
                    </button>
                </form>

                <p class="text-blue-200 text-sm mt-6 text-center">
                    Limited spots available. Register early to secure your place!
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Back to Events Button -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
    <a href="{{ route('events') }}" 
       class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold transition-colors duration-300">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back to All Events
    </a>
</div>
@endsection