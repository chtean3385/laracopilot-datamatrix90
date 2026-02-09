@extends('layouts.admin')

@section('title', 'Event Registrations')

@section('content')
<div class="mb-6">
    <h2 class="text-3xl font-bold text-gray-900">Event Registrations</h2>
    <p class="text-gray-600 mt-1">Manage attendee registrations for all events</p>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($registrations->count() > 0)
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Attendee</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Event</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Contact</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Guests</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Registered</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-700 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($registrations as $registration)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-900">{{ $registration->name }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $registration->event->title }}</div>
                            <div class="text-xs text-gray-500">{{ $registration->event->event_date->format('M d, Y') }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $registration->email }}</div>
                            <div class="text-xs text-gray-500">{{ $registration->phone }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-xs font-semibold">
                                {{ $registration->guests }} guest(s)
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $registration->created_at->diffForHumans() }}</td>
                        <td class="px-6 py-4 text-right">
                            <form action="{{ route('admin.registrations.destroy', $registration->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this registration?');">
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
            {{ $registrations->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <i class="fas fa-users text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-bold text-gray-700 mb-2">No Registrations Yet</h3>
            <p class="text-gray-500">Event registrations will appear here once people start signing up.</p>
        </div>
    @endif
</div>
@endsection
