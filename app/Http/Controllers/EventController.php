<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $upcomingEvents = Event::where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->get();
        
        $pastEvents = Event::where('event_date', '<', now())
            ->orderBy('event_date', 'desc')
            ->get();
        
        return view('events', compact('upcomingEvents', 'pastEvents'));
    }

    public function register(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20'
        ]);
        
        EventRegistration::create([
            'event_id' => $event->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone']
        ]);
        
        return redirect()->route('events')->with('success', 'Registration successful! We will contact you soon.');
    }
}