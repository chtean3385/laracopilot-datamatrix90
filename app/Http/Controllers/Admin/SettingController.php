<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $settings = Setting::firstOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Wildlife Photography',
                'contact_email' => 'info@wildlifephoto.com',
                'contact_phone' => '+1 (555) 123-4567',
                'contact_address' => '123 Safari Lane, Wildlife Reserve, CA 90210',
                'facebook_url' => 'https://facebook.com/wildlifephoto',
                'instagram_url' => 'https://instagram.com/wildlifephoto',
                'twitter_url' => 'https://twitter.com/wildlifephoto',
                'youtube_url' => 'https://youtube.com/wildlifephoto',
                'footer_about' => 'Capturing the beauty and wonder of wildlife through the lens. Professional wildlife photography and expedition services.',
                'copyright_text' => '© ' . date('Y') . ' Wildlife Photography. All rights reserved.'
            ]
        );

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'contact_address' => 'nullable|string|max:500',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'footer_about' => 'nullable|string|max:1000',
            'copyright_text' => 'nullable|string|max:255'
        ]);

        $settings = Setting::firstOrCreate(['id' => 1]);
        $settings->update($validated);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully!');
    }
}