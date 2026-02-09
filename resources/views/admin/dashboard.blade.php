@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- Welcome Banner -->
<div class="bg-gradient-to-r from-amber-500 to-orange-600 rounded-2xl p-8 mb-8 shadow-2xl">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-white mb-2">Welcome back, {{ ucfirst(session('admin_user')) }}! 👋</h1>
            <p class="text-white/90">Here's what's happening with your wildlife photography portfolio today</p>
        </div>
        <div class="hidden md:block">
            <i class="fas fa-mountain text-white/20 text-8xl"></i>
        </div>
    </div>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Gallery Items -->
    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl p-6 border border-gray-700 hover:border-amber-500 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-images text-white text-2xl"></i>
            </div>
            <div class="text-right">
                <div class="text-3xl font-black text-white">{{ $totalGalleryItems }}</div>
                <div class="text-gray-400 text-sm font-semibold">Gallery Items</div>
            </div>
        </div>
        <div class="flex items-center text-emerald-500 text-sm font-semibold">
            <i class="fas fa-arrow-up mr-2"></i>
            <span>View all photos</span>
        </div>
    </div>
    
    <!-- Total Events -->
    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl p-6 border border-gray-700 hover:border-emerald-500 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-green-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-calendar-alt text-white text-2xl"></i>
            </div>
            <div class="text-right">
                <div class="text-3xl font-black text-white">{{ $totalEvents }}</div>
                <div class="text-gray-400 text-sm font-semibold">Total Events</div>
            </div>
        </div>
        <div class="flex items-center text-emerald-500 text-sm font-semibold">
            <i class="fas fa-plus mr-2"></i>
            <span>Create new event</span>
        </div>
    </div>
    
    <!-- Upcoming Events -->
    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl p-6 border border-gray-700 hover:border-blue-500 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-clock text-white text-2xl"></i>
            </div>
            <div class="text-right">
                <div class="text-3xl font-black text-white">{{ $upcomingEvents }}</div>
                <div class="text-gray-400 text-sm font-semibold">Upcoming</div>
            </div>
        </div>
        <div class="flex items-center text-blue-500 text-sm font-semibold">
            <i class="fas fa-calendar-check mr-2"></i>
            <span>Scheduled expeditions</span>
        </div>
    </div>
    
    <!-- Total Registrations -->
    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl p-6 border border-gray-700 hover:border-purple-500 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-users text-white text-2xl"></i>
            </div>
            <div class="text-right">
                <div class="text-3xl font-black text-white">{{ $totalRegistrations }}</div>
                <div class="text-gray-400 text-sm font-semibold">Registrations</div>
            </div>
        </div>
        <div class="flex items-center text-purple-500 text-sm font-semibold">
            <i class="fas fa-user-check mr-2"></i>
            <span>Total attendees</span>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Recent Registrations -->
    <div class="lg:col-span-2">
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700 overflow-hidden">
            <div class="p-6 border-b border-gray-700">
                <h3 class="text-xl font-bold text-white flex items-center">
                    <i class="fas fa-user-plus text-amber-500 mr-3"></i>
                    Recent Registrations
                </h3>
            </div>
            
            @if($recentRegistrations->count() > 0)
                <div class="divide-y divide-gray-700">
                    @foreach($recentRegistrations as $registration)
                        <div class="p-6 hover:bg-gray-800/50 transition-colors">
                            <div class="flex items-start justify-between">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-full flex items-center justify-center flex-shrink-0">
                                        <span class="text-white font-bold">{{ strtoupper(substr($registration->name, 0, 1)) }}</span>
                                    </div>
                                    <div>
                                        <h4 class="text-white font-bold mb-1">{{ $registration->name }}</h4>
                                        <p class="text-gray-400 text-sm mb-2">{{ $registration->event->title }}</p>
                                        <div class="flex items-center space-x-4 text-xs text-gray-500">
                                            <span><i class="far fa-envelope mr-1"></i>{{ $registration->email }}</span>
                                            <span><i class="far fa-user mr-1"></i>{{ $registration->guests }} guest(s)</span>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-gray-500 text-xs">{{ $registration->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="p-4 bg-gray-800/50 text-center">
                    <a href="{{ route('admin.registrations.index') }}" class="text-amber-500 hover:text-amber-400 font-semibold text-sm">
                        View All Registrations <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            @else
                <div class="p-12 text-center">
                    <i class="fas fa-inbox text-gray-700 text-5xl mb-4"></i>
                    <p class="text-gray-500">No registrations yet</p>
                </div>
            @endif
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="space-y-6">
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700 p-6">
            <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                <i class="fas fa-bolt text-amber-500 mr-3"></i>
                Quick Actions
            </h3>
            <div class="space-y-3">
                <a href="{{ route('admin.gallery.create') }}" class="block w-full px-4 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-white font-semibold rounded-lg hover:shadow-xl hover:shadow-orange-500/30 transition-all text-center">
                    <i class="fas fa-plus mr-2"></i>Add Gallery Item
                </a>
                <a href="{{ route('admin.events.create') }}" class="block w-full px-4 py-3 bg-gradient-to-r from-emerald-500 to-green-600 text-white font-semibold rounded-lg hover:shadow-xl hover:shadow-emerald-500/30 transition-all text-center">
                    <i class="fas fa-calendar-plus mr-2"></i>Create Event
                </a>
                <a href="{{ route('admin.about.edit') }}" class="block w-full px-4 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold rounded-lg hover:shadow-xl hover:shadow-blue-500/30 transition-all text-center">
                    <i class="fas fa-edit mr-2"></i>Edit About Page
                </a>
                <a href="{{ route('admin.settings.index') }}" class="block w-full px-4 py-3 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg transition-all text-center">
                    <i class="fas fa-cog mr-2"></i>Site Settings
                </a>
            </div>
        </div>
        
        <!-- Social Stats -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700 p-6">
            <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                <i class="fas fa-chart-line text-emerald-500 mr-3"></i>
                Social Stats
            </h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="fab fa-instagram text-pink-500 text-2xl mr-3"></i>
                        <span class="text-gray-300 font-semibold">Instagram</span>
                    </div>
                    <span class="text-white font-bold">{{ $socialFeedCount }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="fas fa-images text-amber-500 text-2xl mr-3"></i>
                        <span class="text-gray-300 font-semibold">Gallery</span>
                    </div>
                    <span class="text-white font-bold">{{ $totalGalleryItems }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="fas fa-calendar text-blue-500 text-2xl mr-3"></i>
                        <span class="text-gray-300 font-semibold">Events</span>
                    </div>
                    <span class="text-white font-bold">{{ $totalEvents }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
