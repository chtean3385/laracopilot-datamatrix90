@extends('layouts.admin')

@section('title', 'Gallery Management')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold text-gray-900">Gallery Management</h2>
        <p class="text-gray-600 mt-1">Manage your photography portfolio</p>
    </div>
    <a href="{{ route('admin.gallery.create') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
        <i class="fas fa-plus mr-2"></i>Add New Item
    </a>
</div>

<div class="bg-white rounded-lg shadow">
    @if($galleries->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            @foreach($galleries as $item)
                <div class="bg-white border rounded-lg overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative">
                        <img src="https://picsum.photos/400/300?random={{ $item->id }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                        @if($item->featured)
                            <span class="absolute top-2 right-2 bg-yellow-400 text-gray-900 px-3 py-1 rounded-full text-xs font-bold">
                                <i class="fas fa-star mr-1"></i>Featured
                            </span>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900 mb-2">{{ $item->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($item->description, 80) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500">{{ $item->created_at->format('M d, Y') }}</span>
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.gallery.edit', $item->id) }}" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this gallery item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="px-6 py-4 border-t">
            {{ $galleries->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-bold text-gray-700 mb-2">No Gallery Items Yet</h3>
            <p class="text-gray-500 mb-6">Start building your portfolio by adding your first gallery item.</p>
            <a href="{{ route('admin.gallery.create') }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                <i class="fas fa-plus mr-2"></i>Add First Item
            </a>
        </div>
    @endif
</div>
@endsection
