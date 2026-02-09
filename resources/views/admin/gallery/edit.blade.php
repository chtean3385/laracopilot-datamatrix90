@extends('layouts.admin')

@section('title', 'Edit Gallery Item')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.gallery.index') }}" class="text-indigo-600 hover:text-indigo-700 font-semibold">
        <i class="fas fa-arrow-left mr-2"></i>Back to Gallery
    </a>
</div>

<div class="bg-white rounded-lg shadow p-8 max-w-3xl">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Edit Gallery Item</h2>
    
    <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Title *</label>
            <input type="text" name="title" value="{{ old('title', $gallery->title) }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('title') border-red-500 @enderror" required>
            @error('title')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('description') border-red-500 @enderror">{{ old('description', $gallery->description) }}</textarea>
            @error('description')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Current Image</label>
            <img src="https://picsum.photos/400/300?random={{ $gallery->id }}" alt="{{ $gallery->title }}" class="w-48 h-36 object-cover rounded-lg mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Change Image</label>
            <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('image') border-red-500 @enderror">
            <p class="text-gray-500 text-sm mt-1">Leave empty to keep current image. Max size: 5MB</p>
            @error('image')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="featured" value="1" {{ old('featured', $gallery->featured) ? 'checked' : '' }} class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                <span class="ml-2 text-gray-700 font-semibold">Featured Item</span>
            </label>
        </div>
        
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.gallery.index') }}" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-400 transition-colors">
                Cancel
            </a>
            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                <i class="fas fa-save mr-2"></i>Update Gallery Item
            </button>
        </div>
    </form>
</div>
@endsection
