<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialFeed;
use Illuminate\Http\Request;

class AdminSocialController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $feeds = SocialFeed::orderBy('posted_at', 'desc')->paginate(20);
        return view('admin.social.index', compact('feeds'));
    }
    
    public function refresh(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        // This would integrate with Instagram/Facebook API
        // For now, return a message
        return redirect()->route('admin.social.index')->with('success', 'Social feeds refresh initiated. Note: API integration required for live data.');
    }
    
    public function destroy($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        SocialFeed::findOrFail($id)->delete();
        
        return redirect()->route('admin.social.index')->with('success', 'Social feed deleted successfully!');
    }
}