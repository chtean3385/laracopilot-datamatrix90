<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialFeed;
use Carbon\Carbon;

class SocialFeedSeeder extends Seeder
{
    public function run()
    {
        $feeds = [
            [
                'platform' => 'instagram',
                'content' => 'Just wrapped up an amazing wedding shoot! The golden hour lighting was absolutely perfect. 🌅✨ #weddingphotography #goldenhour #love',
                'image_url' => 'https://picsum.photos/400/400?random=1',
                'post_url' => 'https://instagram.com/p/sample1',
                'posted_at' => Carbon::now()->subDays(1)
            ],
            [
                'platform' => 'facebook',
                'content' => 'Excited to announce our upcoming Portrait Photography Workshop! Limited spots available. Link in bio to register. 📸',
                'image_url' => 'https://picsum.photos/400/400?random=2',
                'post_url' => 'https://facebook.com/post/sample2',
                'posted_at' => Carbon::now()->subDays(2)
            ],
            [
                'platform' => 'instagram',
                'content' => 'Behind the scenes from today\'s fashion shoot 👗📷 Working with an incredible team always brings out the best results! #fashionphotography #bts',
                'image_url' => 'https://picsum.photos/400/400?random=3',
                'post_url' => 'https://instagram.com/p/sample3',
                'posted_at' => Carbon::now()->subDays(3)
            ],
            [
                'platform' => 'facebook',
                'content' => 'Thank you to everyone who attended last week\'s workshop! Your enthusiasm and dedication to the craft is truly inspiring. Already planning the next one! 🙌',
                'image_url' => 'https://picsum.photos/400/400?random=4',
                'post_url' => 'https://facebook.com/post/sample4',
                'posted_at' => Carbon::now()->subDays(5)
            ],
            [
                'platform' => 'instagram',
                'content' => 'New portfolio piece! Corporate headshots session with the amazing team at TechCorp. Professional, polished, and perfectly lit. 💼✨ #corporatephotography #headshots',
                'image_url' => 'https://picsum.photos/400/400?random=5',
                'post_url' => 'https://instagram.com/p/sample5',
                'posted_at' => Carbon::now()->subDays(7)
            ],
            [
                'platform' => 'instagram',
                'content' => 'Sunset maternity session from yesterday 🌅🤰 There\'s something so magical about capturing this beautiful journey. #maternityphotography #expecting',
                'image_url' => 'https://picsum.photos/400/400?random=6',
                'post_url' => 'https://instagram.com/p/sample6',
                'posted_at' => Carbon::now()->subDays(10)
            ]
        ];
        
        foreach ($feeds as $feed) {
            SocialFeed::create($feed);
        }
    }
}