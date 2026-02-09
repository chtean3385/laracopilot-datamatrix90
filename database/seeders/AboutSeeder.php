<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run()
    {
        About::create([
            'title' => 'Capturing Moments, Creating Memories',
            'subtitle' => 'Professional Photographer & Visual Artist',
            'bio' => "Hello! I'm a passionate photographer specializing in wedding, portrait, and event photography. With over a decade of experience, I've had the privilege of capturing thousands of special moments for clients around the world.\n\nMy approach to photography is simple: tell your story authentically. Whether it's the joy of a wedding day, the confidence in a portrait session, or the energy of a corporate event, I aim to capture the essence of every moment.\n\nI believe that great photography is about more than just technical skill – it's about understanding people, anticipating moments, and creating an environment where genuine emotions can shine through.",
            'experience_years' => 12,
            'specialization' => 'Wedding, Portrait & Event Photography'
        ]);
    }
}