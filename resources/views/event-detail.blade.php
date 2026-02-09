@extends('layouts.app')

@section('title', $event->title)

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4">
        <a href="{{ route('events') }}" class="inline-flex items-center text-white hover:text-indigo-100 mb-6">
            <i class="fas fa-arrow-left mr-2"></i>Back to Events
        </a>
        <h1 class="text-5xl font-bold">{{ $event->title }}</h1>
    </div>
</section>

<!-- Event Details -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <img src="https://picsum.photos/800/500?random=detail{{ $event->id }}" alt="{{ $event->title }}" class="w-full h-96 object-cover rounded-lg shadow-lg mb-8">
                
                <div class="prose prose-lg max-w-none">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">About This Event</h2>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $event->description }}</p>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div>
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Event Information</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-indigo-100 rounded-lg p-3 mr-4">
                                <i class="far fa-calendar text-indigo-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Date</h4>
                                <p class="text-gray-600">{{ $event->event_date->format('l, F d, Y') }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-indigo-100 rounded-lg p-3 mr-4">
                                <i class="far fa-clock text-indigo-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Time</h4>
                                <p class="text-gray-600">{{ $event->event_time }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-indigo-100 rounded-lg p-3 mr-4">
                                <i class="fas fa-map-marker-alt text-indigo-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Location</h4>
                                <p class="text-gray-600">{{ $event->location }}</p>
                            </div>
                        </div>
                        
                        @if($event->max_attendees)
                            <div class="flex items-start">
                                <div class="bg-indigo-100 rounded-lg p-3 mr-4">
                                    <i class="fas fa-users text-indigo-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Capacity</h4>
                                    <p class="text-gray-600">{{ $event->max_attendees }} attendees max</p>
                                </div>
                            </div>
                        @endif
                        
                        <div class="flex items-start">
                            <div class="bg-indigo-100 rounded-lg p-3 mr-4">
                                <i class="fas fa-tag text-indigo-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Status</h4>
                                @if($event->event_type === 'upcoming')
                                    <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">Upcoming</span>
                                @elseif($event->event_type === 'recent')
                                    <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">Recent</span>
                                @else
                                    <span class="inline-block bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-semibold">Past</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                @if($event->event_type === 'upcoming')
                    <div class="bg-indigo-50 rounded-lg shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Register for This Event</h3>
                        
                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                            </div>
                        @endif
                        
                        <form action="{{ route('events.register', $event->id) }}" method="POST">
                            @csrf
                            
                            <div class="mb-4">
                                <label class="block text-gray-700 font-semibold mb-2">Full Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 @error('name') border-red-500 @enderror" required>
                                @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-gray-700 font-semibold mb-2">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 @error('email') border-red-500 @enderror" required>
                                @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-gray-700 font-semibold mb-2">Phone</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 @error('phone') border-red-500 @enderror" required>
                                @error('phone')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-gray-700 font-semibold mb-2">Number of Guests</label>
                                <input type="number" name="guests" value="{{ old('guests', 1) }}" min="1" class="w-full border border-gray-300 rounded-lg px-4 py-2 @error('guests') border-red-500 @enderror" required>
                                @error('guests')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                            
                            <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                                <i class="fas fa-check-circle mr-2"></i>Register Now
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
