@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-32">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fade-in">Capturing Life's Beautiful Moments</h1>
        <p class="text-xl md:text-2xl mb-8 text-indigo-100">Professional photography that tells your unique story</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('gallery') }}" class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-indigo-50 transition-all transform hover:scale-105">
                View Gallery
            </a>
            <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition-all transform hover:scale-105">
                Get in Touch
            </a>
        </div>
    </div>
</section>

<!-- Featured Work -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Featured Work</h2>
            <p class="text-gray-600 text-lg">Showcasing our best photography</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($featuredWorks as $work)
                <div class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                    <img src="https://picsum.photos/400/500?random={{ $work->id }}" alt="{{ $work->title }}" class="w-full h-80 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <h3 class="text-xl font-bold mb-2">{{ $work->title }}</h3>
                            <p class="text-sm text-gray-200">{{ Str::limit($work->description, 80) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-gray-500">
                    <i class="fas fa-images text-6xl mb-4"></i>
                    <p>No featured work available yet.</p>
                </div>
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('gallery') }}" class="inline-block bg-indigo-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                View Full Gallery
            </a>
        </div>
    </div>
</section>

<!-- Upcoming Events -->
@if($upcomingEvents->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Upcoming Events</h2>
            <p class="text-gray-600 text-lg">Join us for workshops and photography sessions</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($upcomingEvents as $event)
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow overflow-hidden">
                    <img src="https://picsum.photos/400/250?random=event{{ $event->id }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center text-sm text-indigo-600 mb-2">
                            <i class="far fa-calendar mr-2"></i>
                            <span>{{ $event->event_date->format('M d, Y') }} • {{ $event->event_time }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $event->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($event->description, 100) }}</p>
                        <a href="{{ route('events.show', $event->id) }}" class="text-indigo-600 hover:text-indigo-700 font-semibold">
                            Learn More <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('events') }}" class="inline-block bg-indigo-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                View All Events
            </a>
        </div>
    </div>
</section>
@endif

<!-- Social Feed -->
@if($socialFeeds->count() > 0)
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Recent Activity</h2>
            <p class="text-gray-600 text-lg">Follow our latest updates on social media</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($socialFeeds as $feed)
                <div class="bg-gray-50 rounded-lg p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        @if($feed->platform === 'instagram')
                            <i class="fab fa-instagram text-2xl text-pink-500 mr-3"></i>
                        @else
                            <i class="fab fa-facebook text-2xl text-blue-600 mr-3"></i>
                        @endif
                        <div>
                            <p class="font-semibold text-gray-900">{{ ucfirst($feed->platform) }}</p>
                            <p class="text-sm text-gray-500">{{ $feed->posted_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    
                    @if($feed->image_url)
                        <img src="{{ $feed->image_url }}" alt="Social post" class="w-full h-48 object-cover rounded-lg mb-4">
                    @endif
                    
                    <p class="text-gray-700 mb-4">{{ $feed->content }}</p>
                    
                    <a href="{{ $feed->post_url }}" target="_blank" class="text-indigo-600 hover:text-indigo-700 font-semibold text-sm">
                        View on {{ ucfirst($feed->platform) }} <i class="fas fa-external-link-alt ml-1"></i>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-4">Ready to Capture Your Story?</h2>
        <p class="text-xl mb-8 text-indigo-100">Let's work together to create something beautiful</p>
        <a href="{{ route('contact') }}" class="inline-block bg-white text-indigo-600 px-8 py-4 rounded-lg font-semibold hover:bg-indigo-50 transition-all transform hover:scale-105">
            Contact Us Today
        </a>
    </div>
</section>
@endsection
