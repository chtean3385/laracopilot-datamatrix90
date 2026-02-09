<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run()
    {
        Setting::create([
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
        ]);
    }
}