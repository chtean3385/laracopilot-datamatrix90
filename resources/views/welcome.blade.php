@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Immersive Hero Section -->
<section class="relative h-screen">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920&q=80" alt="Mountain Landscape" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/80"></div>
    </div>
    
    <div class="relative h-full flex items-center justify-center text-center px-4">
        <div class="max-w-5xl" data-aos="fade-up" data-aos-duration="1200">
            <h1 class="text-6xl md:text-8xl font-black text-white mb-6 tracking-tight">
                Wild <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500">Moments</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-200 mb-8 font-light max-w-3xl mx-auto">
                Capturing the raw beauty of nature, wildlife, and adventure through the lens
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('gallery') }}" class="group relative px-8 py-4 bg-white text-gray-900 font-bold text-lg rounded-full overflow-hidden transition-all duration-300 hover:scale-105">
                    <span class="relative z-10">Explore Gallery</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-amber-400 to-orange-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
                <a href="{{ route('events') }}" class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold text-lg rounded-full hover:bg-white hover:text-gray-900 transition-all duration-300">
                    Photo Expeditions
                </a>
            </div>
        </div>
    </div>
    
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
        <i class="fas fa-chevron-down text-white text-3xl"></i>
    </div>
</section>

<!-- Featured Gallery Section -->
<section class="py-20 bg-gradient-to-b from-gray-900 to-black">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-5xl md:text-6xl font-black text-white mb-4">
                Featured <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-emerald-500">Captures</span>
            </h2>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto">Wilderness moments frozen in time</p>
        </div>
        
        @if($featuredGallery->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($featuredGallery as $item)
                    <div class="group relative overflow-hidden rounded-2xl aspect-[4/5] cursor-pointer" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                        <img src="https://images.unsplash.com/photo-{{ ['1506905925346-21bda4d32df4', '1441974231531-c6227db76b6e', '1469474968028-56623f02e42e', '1518837695005-2083093ee35b', '1501594907352-04cda38ebc29', '1472214103451-9374bd1c798e'][$loop->index % 6] }}?w=600&h=800&q=80" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <div class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-8 group-hover:translate-y-0 transition-transform duration-500">
                                <h3 class="text-2xl font-bold text-white mb-2">{{ $item->title }}</h3>
                                <p class="text-gray-300">{{ Str::limit($item->description, 80) }}</p>
                            </div>
                        </div>
                        <div class="absolute top-4 right-4">
                            <span class="bg-amber-500 text-gray-900 px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider">
                                <i class="fas fa-star mr-1"></i>Featured
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <p class="text-gray-500 text-lg">No featured photos yet. Check back soon!</p>
            </div>
        @endif
    </div>
</section>

<!-- About Preview Section -->
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920&q=80" alt="Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/70 to-transparent"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <h2 class="text-5xl md:text-6xl font-black text-white mb-6 leading-tight">
                    Chasing <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-emerald-500">Wild</span> Adventures
                </h2>
                <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                    From towering mountain peaks to serene forest trails, I capture the untamed beauty of our planet. Every photo tells a story of adventure, wilderness, and the incredible biodiversity that surrounds us.
                </p>
                <div class="flex items-center space-x-8 mb-8">
                    <div>
                        <div class="text-4xl font-black text-amber-500">{{ $about->experience_years ?? '8' }}+</div>
                        <div class="text-gray-400 font-semibold">Years in Wild</div>
                    </div>
                    <div>
                        <div class="text-4xl font-black text-emerald-500">{{ $totalGalleryItems }}</div>
                        <div class="text-gray-400 font-semibold">Photo Captures</div>
                    </div>
                </div>
                <a href="{{ route('about') }}" class="inline-block px-8 py-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold text-lg rounded-full hover:shadow-2xl hover:shadow-emerald-500/50 transition-all duration-300">
                    My Story <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            
            <div class="relative" data-aos="fade-left">
                <div class="grid grid-cols-2 gap-4">
                    <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=400&q=80" alt="Forest" class="rounded-2xl shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=400&q=80" alt="Mountain" class="rounded-2xl shadow-2xl mt-8">
                    <img src="https://images.unsplash.com/photo-1518837695005-2083093ee35b?w=400&q=80" alt="Waterfall" class="rounded-2xl shadow-2xl -mt-8">
                    <img src="https://images.unsplash.com/photo-1501594907352-04cda38ebc29?w=400&q=80" alt="Wildlife" class="rounded-2xl shadow-2xl">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Upcoming Events Section -->
@if($upcomingEvents->count() > 0)
<section class="py-20 bg-black">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-5xl md:text-6xl font-black text-white mb-4">
                Join the <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500">Expedition</span>
            </h2>
            <p class="text-xl text-gray-400">Photography workshops in nature's playground</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($upcomingEvents->take(3) as $event)
                <div class="group relative bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl overflow-hidden hover:shadow-2xl hover:shadow-amber-500/30 transition-all duration-500" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-{{ ['1506905925346-21bda4d32df4', '1441974231531-c6227db76b6e', '1469474968028-56623f02e42e'][$loop->index % 3] }}?w=600&q=80" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-center text-amber-500 text-sm font-bold mb-3">
                            <i class="far fa-calendar mr-2"></i>
                            {{ $event->event_date->format('M d, Y') }}
                        </div>
                        <h3 class="text-2xl font-black text-white mb-3 group-hover:text-amber-500 transition-colors">{{ $event->title }}</h3>
                        <p class="text-gray-400 mb-4">{{ Str::limit($event->description, 100) }}</p>
                        <a href="{{ route('events.show', $event->id) }}" class="inline-flex items-center text-amber-500 font-bold hover:text-amber-400 transition-colors">
                            Learn More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Social Feed Preview -->
@if($socialFeeds->count() > 0)
<section class="py-20 bg-gradient-to-b from-black to-gray-900">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-5xl md:text-6xl font-black text-white mb-4">
                Latest <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-500">Adventures</span>
            </h2>
            <p class="text-xl text-gray-400">Follow my journey on Instagram</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($socialFeeds->take(6) as $feed)
                <a href="{{ $feed->post_url }}" target="_blank" class="group relative aspect-square overflow-hidden rounded-xl" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 50 }}">
                    <img src="https://images.unsplash.com/photo-{{ ['1506905925346-21bda4d32df4', '1441974231531-c6227db76b6e', '1469474968028-56623f02e42e', '1518837695005-2083093ee35b', '1501594907352-04cda38ebc29', '1472214103451-9374bd1c798e'][$loop->index % 6] }}?w=400&q=80" alt="Social" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <i class="fab fa-instagram text-white text-4xl"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="relative py-32">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1472214103451-9374bd1c798e?w=1920&q=80" alt="Stars" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/70"></div>
    </div>
    
    <div class="relative max-w-4xl mx-auto px-4 text-center" data-aos="fade-up">
        <h2 class="text-5xl md:text-6xl font-black text-white mb-6">
            Ready to Capture Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500">Adventure?</span>
        </h2>
        <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto">
            Let's create stunning visual stories of your wilderness experiences together
        </p>
        <a href="{{ route('contact') }}" class="inline-block px-10 py-5 bg-gradient-to-r from-amber-500 to-orange-600 text-white font-black text-xl rounded-full hover:shadow-2xl hover:shadow-orange-500/50 transition-all duration-300 transform hover:scale-105">
            Get In Touch <i class="fas fa-paper-plane ml-2"></i>
        </a>
    </div>
</section>

<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        once: true,
        duration: 800
    });
</script>
@endsection
