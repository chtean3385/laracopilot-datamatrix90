@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-4">Photography Gallery</h1>
        <p class="text-xl text-indigo-100">Explore our collection of stunning photography</p>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4">
        @if($galleries->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($galleries as $item)
                    <div class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 cursor-pointer">
                        <img src="https://picsum.photos/400/500?random={{ $item->id }}" alt="{{ $item->title }}" class="w-full h-80 object-cover">
                        
                        @if($item->featured)
                            <div class="absolute top-4 right-4">
                                <span class="bg-yellow-400 text-gray-900 px-3 py-1 rounded-full text-xs font-bold">
                                    <i class="fas fa-star mr-1"></i>Featured
                                </span>
                            </div>
                        @endif
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                <h3 class="text-xl font-bold mb-2">{{ $item->title }}</h3>
                                @if($item->description)
                                    <p class="text-sm text-gray-200">{{ Str::limit($item->description, 100) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-12">
                {{ $galleries->links() }}
            </div>
        @else
            <div class="text-center py-20">
                <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-700 mb-2">No Gallery Items Yet</h3>
                <p class="text-gray-500 mb-6">Gallery items will appear here once added.</p>
                <a href="{{ route('admin.login') }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition-colors">
                    Login to Admin Panel
                </a>
            </div>
        @endif
    </div>
</section>
@endsection
