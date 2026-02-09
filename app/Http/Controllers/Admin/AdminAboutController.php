<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAboutController extends Controller
{
    public function edit()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }
    
    public function update(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'bio' => 'required|string',
            'experience_years' => 'nullable|integer|min:0',
            'specialization' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);
        
        $about = About::first();
        
        if ($request->hasFile('image')) {
            if ($about && $about->image_path && Storage::disk('public')->exists($about->image_path)) {
                Storage::disk('public')->delete($about->image_path);
            }
            
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('about', $fileName, 'public');
            $validated['image_path'] = $filePath;
        }
        
        if ($about) {
            $about->update($validated);
        } else {
            About::create($validated);
        }
        
        return redirect()->route('admin.about.edit')->with('success', 'About page updated successfully!');
    }
}