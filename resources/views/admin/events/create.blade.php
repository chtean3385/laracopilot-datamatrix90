@extends('layouts.admin')

@section('title', 'Create Event')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.events.index') }}" class="text-indigo-600 hover:text-indigo-700 font-semibold">
        <i class="fas fa-arrow-left mr-2"></i>Back to Events
    </a>
</div>

<div class="bg-white rounded-lg shadow p-8 max-w-3xl">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Create New Event</h2>
    
    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Event Title *</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('title') border-red-500 @enderror" required>
            @error('title')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Description *</label>
            <textarea name="description" rows="5" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('description') border-red-500 @enderror" required>{{ old('description') }}</textarea>
            @error('description')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Event Date *</label>
                <input type="date" name="event_date" value="{{ old('event_date') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('event_date') border-red-500 @enderror" required>
                @error('event_date')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Event Time *</label>
                <input type="time" name="event_time" value="{{ old('event_time') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('event_time') border-red-500 @enderror" required>
                @error('event_time')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Location *</label>
            <input type="text" name="location" value="{{ old('location') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('location') border-red-500 @enderror" required>
            @error('location')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Event Type *</label>
                <select name="event_type" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('event_type') border-red-500 @enderror" required>
                    <option value="upcoming" {{ old('event_type') === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                    <option value="recent" {{ old('event_type') === 'recent' ? 'selected' : '' }}>Recent</option>
                    <option value="past" {{ old('event_type') === 'past' ? 'selected' : '' }}>Past</option>
                </select>
                @error('event_type')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Max Attendees</label>
                <input type="number" name="max_attendees" value="{{ old('max_attendees') }}" min="1" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('max_attendees') border-red-500 @enderror">
                <p class="text-gray-500 text-sm mt-1">Leave empty for unlimited</p>
                @error('max_attendees')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Event Image</label>
            <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 @error('image') border-red-500 @enderror">
            <p class="text-gray-500 text-sm mt-1">Max size: 5MB. Formats: JPEG, PNG, JPG, GIF</p>
            @error('image')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.events.index') }}" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-400 transition-colors">
                Cancel
            </a>
            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                <i class="fas fa-save mr-2"></i>Create Event
            </button>
        </div>
    </form>
</div>
@endsection
