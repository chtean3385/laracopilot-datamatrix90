@extends('layouts.admin')

@section('title', 'Add Gallery Item')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.gallery.index') }}" class="text-indigo-600 hover:text-indigo-700 font-semibold">
        <i class="fas fa-arrow-left mr-2"></i>Back to Gallery
    </a>
</div>

<div class="bg-white rounded-lg shadow p-8 max-w-3xl">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Add New Gallery Item</h2>
    
    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Title *</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('title') border-red-500 @enderror" required>
            @error('title')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Image</label>
            <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('image') border-red-500 @enderror">
            <p class="text-gray-500 text-sm mt-1">Max size: 5MB. Formats: JPEG, PNG, JPG, GIF</p>
            @error('image')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }} class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                <span class="ml-2 text-gray-700 font-semibold">Featured Item</span>
            </label>
            <p class="text-gray-500 text-sm mt-1">Featured items will be highlighted on the homepage</p>
        </div>
        
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.gallery.index') }}" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-400 transition-colors">
                Cancel
            </a>
            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                <i class="fas fa-save mr-2"></i>Add Gallery Item
            </button>
        </div>
    </form>
</div>
@endsection
