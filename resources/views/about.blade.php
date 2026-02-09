@extends('layouts.app')

@section('title', 'About')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-4">{{ $about->title ?? 'About Me' }}</h1>
        <p class="text-xl text-indigo-100">{{ $about->subtitle ?? 'Professional Photographer' }}</p>
    </div>
</section>

<!-- About Content -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                @if($about && $about->image_path)
                    <img src="{{ asset('storage/' . $about->image_path) }}" alt="Photographer" class="rounded-lg shadow-2xl">
                @else
                    <img src="https://picsum.photos/600/700?random=about" alt="Photographer" class="rounded-lg shadow-2xl">
                @endif
            </div>
            
            <div>
                @if($about)
                    <div class="prose prose-lg max-w-none">
                        {!! nl2br(e($about->bio)) !!}
                    </div>
                    
                    <div class="grid grid-cols-2 gap-6 mt-8">
                        @if($about->experience_years)
                            <div class="bg-indigo-50 rounded-lg p-6 text-center">
                                <div class="text-4xl font-bold text-indigo-600 mb-2">{{ $about->experience_years }}+</div>
                                <div class="text-gray-700 font-semibold">Years Experience</div>
                            </div>
                        @endif
                        
                        @if($about->specialization)
                            <div class="bg-purple-50 rounded-lg p-6 text-center">
                                <div class="text-lg font-bold text-purple-600 mb-2">{{ $about->specialization }}</div>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6">
                        <p class="text-yellow-800"><i class="fas fa-info-circle mr-2"></i>About content not configured yet. Please login to admin panel to add content.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Let's Work Together</h2>
        <p class="text-xl text-gray-600 mb-8">Ready to capture your special moments?</p>
        <a href="{{ route('contact') }}" class="inline-block bg-indigo-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
            Get in Touch
        </a>
    </div>
</section>
@endsection
