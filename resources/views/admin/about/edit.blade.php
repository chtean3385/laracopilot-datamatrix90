@extends('layouts.admin')

@section('title', 'Edit About Page')

@section('content')
<div class="mb-6">
    <h2 class="text-3xl font-bold text-gray-900">Edit About Page</h2>
    <p class="text-gray-600 mt-1">Update your photographer bio and information</p>
</div>

<div class="bg-white rounded-lg shadow p-8 max-w-3xl">
    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Page Title *</label>
            <input type="text" name="title" value="{{ old('title', $about->title ?? 'About Me') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('title') border-red-500 @enderror" required>
            @error('title')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Subtitle</label>
            <input type="text" name="subtitle" value="{{ old('subtitle', $about->subtitle ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('subtitle') border-red-500 @enderror">
            @error('subtitle')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Biography *</label>
            <textarea name="bio" rows="8" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('bio') border-red-500 @enderror" required>{{ old('bio', $about->bio ?? '') }}</textarea>
            @error('bio')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Years of Experience</label>
                <input type="number" name="experience_years" value="{{ old('experience_years', $about->experience_years ?? '') }}" min="0" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('experience_years') border-red-500 @enderror">
                @error('experience_years')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Specialization</label>
                <input type="text" name="specialization" value="{{ old('specialization', $about->specialization ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('specialization') border-red-500 @enderror">
                @error('specialization')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="mb-6">
            @if($about && $about->image_path)
                <label class="block text-gray-700 font-semibold mb-2">Current Image</label>
                <img src="{{ asset('storage/' . $about->image_path) }}" alt="Current photo" class="w-48 h-48 object-cover rounded-lg mb-4">
            @endif
            <label class="block text-gray-700 font-semibold mb-2">Profile Photo</label>
            <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('image') border-red-500 @enderror">
            <p class="text-gray-500 text-sm mt-1">Leave empty to keep current image. Max size: 5MB</p>
            @error('image')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.dashboard') }}" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-400 transition-colors">
                Cancel
            </a>
            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                <i class="fas fa-save mr-2"></i>Update About Page
            </button>
        </div>
    </form>
</div>
@endsection
