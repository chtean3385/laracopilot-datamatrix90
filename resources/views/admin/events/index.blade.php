@extends('layouts.admin')

@section('title', 'Events Management')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold text-gray-900">Events Management</h2>
        <p class="text-gray-600 mt-1">Manage workshops, exhibitions, and photography sessions</p>
    </div>
    <a href="{{ route('admin.events.create') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
        <i class="fas fa-plus mr-2"></i>Add New Event
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($events->count() > 0)
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Event</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Date & Time</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Location</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Attendees</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-700 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($events as $event)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-900">{{ $event->title }}</div>
                            <div class="text-sm text-gray-500">{{ Str::limit($event->description, 50) }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $event->event_date->format('M d, Y') }}</div>
                            <div class="text-sm text-gray-500">{{ $event->event_time }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ Str::limit($event->location, 30) }}</td>
                        <td class="px-6 py-4">
                            @if($event->event_type === 'upcoming')
                                <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">Upcoming</span>
                            @elseif($event->event_type === 'recent')
                                <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">Recent</span>
                            @else
                                <span class="inline-block bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-xs font-semibold">Past</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $event->max_attendees ?? 'Unlimited' }}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="text-blue-600 hover:text-blue-700 mr-4">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this event?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="px-6 py-4 border-t">
            {{ $events->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <i class="fas fa-calendar-times text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-bold text-gray-700 mb-2">No Events Yet</h3>
            <p class="text-gray-500 mb-6">Create your first event to start managing workshops and sessions.</p>
            <a href="{{ route('admin.events.create') }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                <i class="fas fa-plus mr-2"></i>Add First Event
            </a>
        </div>
    @endif
</div>
@endsection
