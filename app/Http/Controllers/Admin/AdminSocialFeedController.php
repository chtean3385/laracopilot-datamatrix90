<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialFeed;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSocialFeedController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $socialFeeds = SocialFeed::orderBy('posted_at', 'desc')->paginate(20);
        return view('admin.social-feeds.index', compact('socialFeeds'));
    }
    
    public function refresh(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $settings = Setting::first();
        
        // Simulated social feed refresh (In production, use actual API calls)
        // Instagram API: https://developers.facebook.com/docs/instagram-basic-display-api
        // Facebook API: https://developers.facebook.com/docs/graph-api
        
        $sampleFeeds = [
            [
                'platform' => 'instagram',
                'content' => 'Beautiful sunset shoot from yesterday! 🌅 #photography #sunset',
                'image_url' => 'https://picsum.photos/400/400?random=1',
                'post_url' => 'https://instagram.com/p/sample1',
                'posted_at' => now()->subDays(1)
            ],
            [
                'platform' => 'facebook',
                'content' => 'Had an amazing time capturing this wedding! Thank you for trusting me with your special day. 💒',
                'image_url' => 'https://picsum.photos/400/400?random=2',
                'post_url' => 'https://facebook.com/sample2',
                'posted_at' => now()->subDays(2)
            ],
            [
                'platform' => 'instagram',
                'content' => 'Portrait session highlights ✨ #portraitphotography #studio',
                'image_url' => 'https://picsum.photos/400/400?random=3',
                'post_url' => 'https://instagram.com/p/sample3',
                'posted_at' => now()->subDays(3)
            ]
        ];
        
        foreach ($sampleFeeds as $feed) {
            SocialFeed::updateOrCreate(
                ['post_url' => $feed['post_url']],
                $feed
            );
        }
        
        return redirect()->route('admin.social.index')
            ->with('success', 'Social feeds refreshed! (Sample data - configure API tokens in Settings for real data)');
    }
}