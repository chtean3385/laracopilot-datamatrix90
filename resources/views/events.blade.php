@extends('layouts.app')

@section('title', 'Events & Expeditions - Wildlife Photography')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-slate-800 to-slate-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl font-bold mb-4">Wildlife Photography Events & Expeditions</h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">
            Join us on unforgettable wildlife photography adventures. From workshops to safari expeditions,
            capture stunning moments with expert guidance.
        </p>
    </div>
</div>

@if(session('success'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            {{ session('success') }}
        </div>
    </div>
@endif

<!-- Upcoming Events Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="mb-12">
        <h2 class="text-4xl font-bold text-gray-800 mb-3">Upcoming Events</h2>
        <p class="text-gray-600 text-lg">Don't miss out on these exciting photography opportunities</p>
    </div>

    @if($upcomingEvents->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($upcomingEvents as $event)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                    @if($event->image_url)
                        <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full font-semibold">
                                {{ \Carbon\Carbon::parse($event->event_date)->format('M j, Y') }}
                            </span>
                            <span class="text-2xl font-bold text-blue-600">${{ number_format($event->price, 2) }}</span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $event->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($event->description, 120) }}</p>
                        
                        <div class="flex items-center text-gray-500 text-sm mb-4 space-x-4">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $event->location }}
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6z"></path>
                                </svg>
                                {{ $event->max_participants }} spots
                            </div>
                        </div>
                        
                        <a href="{{ route('events.show', $event->id) }}" 
                           class="block w-full text-center bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold py-2 px-4 rounded-lg hover:from-blue-700 hover:to-blue-900 transition-all duration-300">
                            View Details & Register
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <h3 class="text-2xl font-bold text-gray-600 mb-2">No Upcoming Events</h3>
            <p class="text-gray-500">Check back soon for new photography events and expeditions!</p>
        </div>
    @endif
</div>

<!-- Past Events Section -->
@if($pastEvents->count() > 0)
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-3">Past Events</h2>
                <p class="text-gray-600 text-lg">Relive the memories from our previous expeditions</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($pastEvents as $event)
                    <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        @if($event->image_url)
                            <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="w-full h-40 object-cover">
                        @else
                            <div class="w-full h-40 bg-gradient-to-r from-gray-300 to-gray-400 flex items-center justify-center">
                                <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @endif
                        
                        <div class="p-4">
                            <span class="inline-block bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full mb-2">
                                {{ \Carbon\Carbon::parse($event->event_date)->format('M j, Y') }}
                            </span>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $event->title }}</h3>
                            <p class="text-gray-500 text-sm">{{ $event->location }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

<!-- CTA Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold mb-4">Ready to Capture Amazing Wildlife?</h2>
        <p class="text-xl text-blue-100 mb-8">
            Join our community of wildlife photography enthusiasts and embark on the adventure of a lifetime.
        </p>
        <a href="{{ route('contact') }}" 
           class="inline-block bg-white text-blue-700 font-bold py-3 px-8 rounded-lg hover:bg-blue-50 transition-colors duration-300 shadow-lg">
            Contact Us for Custom Expeditions
        </a>
    </div>
</div>
@endsection