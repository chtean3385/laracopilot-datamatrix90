<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\SocialFeed;

class AdminDashboardController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $totalGalleryItems = Gallery::count();
        $totalEvents = Event::count();
        $upcomingEvents = Event::where('event_type', 'upcoming')->count();
        $totalRegistrations = EventRegistration::count();
        $socialFeedCount = SocialFeed::count();
        $recentRegistrations = EventRegistration::with('event')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        return view('admin.dashboard', compact(
            'totalGalleryItems',
            'totalEvents',
            'upcomingEvents',
            'totalRegistrations',
            'socialFeedCount',
            'recentRegistrations'
        ));
    }
}