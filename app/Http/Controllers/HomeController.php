<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Event;
use App\Models\Setting;
use App\Models\SocialFeed;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $featuredWorks = Gallery::where('featured', true)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        
        $upcomingEvents = Event::where('event_type', 'upcoming')
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();
        
        $socialFeeds = SocialFeed::orderBy('posted_at', 'desc')
            ->take(6)
            ->get();
        
        return view('home', compact('settings', 'featuredWorks', 'upcomingEvents', 'socialFeeds'));
    }
}