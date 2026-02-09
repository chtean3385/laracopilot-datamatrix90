<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $events = Event::orderBy('event_date', 'desc')->paginate(15);
        return view('admin.events.index', compact('events'));
    }
    
    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        return view('admin.events.create');
    }
    
    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'event_time' => 'required|string',
            'location' => 'required|string',
            'event_type' => 'required|in:upcoming,recent,past',
            'max_attendees' => 'nullable|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('events', $fileName, 'public');
            $validated['image_path'] = $filePath;
        }
        
        Event::create($validated);
        
        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }
    
    public function edit($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }
    
    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $event = Event::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'event_time' => 'required|string',
            'location' => 'required|string',
            'event_type' => 'required|in:upcoming,recent,past',
            'max_attendees' => 'nullable|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);
        
        if ($request->hasFile('image')) {
            if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
                Storage::disk('public')->delete($event->image_path);
            }
            
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('events', $fileName, 'public');
            $validated['image_path'] = $filePath;
        }
        
        $event->update($validated);
        
        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }
    
    public function destroy($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $event = Event::findOrFail($id);
        
        if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
            Storage::disk('public')->delete($event->image_path);
        }
        
        $event->delete();
        
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }
}