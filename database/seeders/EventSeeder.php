<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run()
    {
        $events = [
            [
                'title' => 'Portrait Photography Workshop',
                'description' => 'Join us for an intensive 3-hour workshop on portrait photography techniques. Learn lighting, posing, and post-processing skills from industry professionals. Perfect for beginners and intermediate photographers looking to enhance their skills.',
                'event_date' => Carbon::now()->addDays(15),
                'event_time' => '10:00 AM - 1:00 PM',
                'location' => 'Elite Photography Studio, New York',
                'event_type' => 'upcoming',
                'max_attendees' => 20,
                'image_path' => 'events/workshop1.jpg'
            ],
            [
                'title' => 'Wedding Photography Masterclass',
                'description' => 'Master the art of wedding photography in this comprehensive full-day masterclass. Cover everything from preparation to ceremony, reception coverage, and delivering the final product to clients.',
                'event_date' => Carbon::now()->addDays(30),
                'event_time' => '9:00 AM - 5:00 PM',
                'location' => 'Grand Ballroom, Hotel Manhattan',
                'event_type' => 'upcoming',
                'max_attendees' => 30,
                'image_path' => 'events/wedding_class.jpg'
            ],
            [
                'title' => 'Annual Photography Exhibition',
                'description' => 'Our annual photography exhibition showcasing the best works from the past year. Meet fellow photographers, view stunning prints, and enjoy networking opportunities with industry professionals.',
                'event_date' => Carbon::now()->addDays(45),
                'event_time' => '6:00 PM - 9:00 PM',
                'location' => 'City Art Gallery, Brooklyn',
                'event_type' => 'upcoming',
                'max_attendees' => 100,
                'image_path' => 'events/exhibition.jpg'
            ],
            [
                'title' => 'Summer Photography Retreat',
                'description' => 'Escape to the mountains for a weekend photography retreat. Capture stunning landscapes, learn night sky photography, and network with passionate photographers in a beautiful setting.',
                'event_date' => Carbon::now()->addDays(60),
                'event_time' => 'All Day (2-day event)',
                'location' => 'Mountain View Resort, Upstate NY',
                'event_type' => 'upcoming',
                'max_attendees' => 25,
                'image_path' => 'events/retreat.jpg'
            ],
            [
                'title' => 'Fashion Photography Seminar',
                'description' => 'Recent seminar covering the latest trends and techniques in fashion photography. Industry experts shared insights on working with models, styling, and building a fashion photography portfolio.',
                'event_date' => Carbon::now()->subDays(10),
                'event_time' => '2:00 PM - 6:00 PM',
                'location' => 'Fashion Institute, Manhattan',
                'event_type' => 'recent',
                'max_attendees' => 40,
                'image_path' => 'events/fashion_seminar.jpg'
            ],
            [
                'title' => 'Product Photography for E-commerce',
                'description' => 'Recent workshop focused on product photography techniques specifically for online sellers. Covered lighting setups, background choices, and editing for web optimization.',
                'event_date' => Carbon::now()->subDays(20),
                'event_time' => '10:00 AM - 2:00 PM',
                'location' => 'Elite Photography Studio, New York',
                'event_type' => 'recent',
                'max_attendees' => 15,
                'image_path' => 'events/product_workshop.jpg'
            ],
            [
                'title' => 'Street Photography Walk',
                'description' => 'Guided street photography walk through downtown Manhattan. Participants learned composition, capturing candid moments, and respecting subjects while shooting in public spaces.',
                'event_date' => Carbon::now()->subDays(30),
                'event_time' => '3:00 PM - 6:00 PM',
                'location' => 'Meeting Point: Times Square',
                'event_type' => 'recent',
                'max_attendees' => 12,
                'image_path' => 'events/street_walk.jpg'
            ],
            [
                'title' => 'Black & White Photography Workshop',
                'description' => 'Past workshop exploring the timeless art of black and white photography. Covered shooting specifically for B&W, conversion techniques, and creating powerful monochrome images.',
                'event_date' => Carbon::now()->subDays(60),
                'event_time' => '11:00 AM - 3:00 PM',
                'location' => 'Elite Photography Studio, New York',
                'event_type' => 'past',
                'max_attendees' => 18,
                'image_path' => 'events/bw_workshop.jpg'
            ],
            [
                'title' => 'Corporate Photography Bootcamp',
                'description' => 'Past intensive bootcamp teaching corporate photography including headshots, office environments, conferences, and business events. Great for photographers looking to enter corporate market.',
                'event_date' => Carbon::now()->subDays(90),
                'event_time' => '9:00 AM - 5:00 PM',
                'location' => 'Business Center, Financial District',
                'event_type' => 'past',
                'max_attendees' => 25,
                'image_path' => 'events/corporate_bootcamp.jpg'
            ],
            [
                'title' => 'Lightroom Editing Workshop',
                'description' => 'Past workshop dedicated to Adobe Lightroom post-processing. Covered workflow optimization, color correction, presets creation, and batch editing techniques.',
                'event_date' => Carbon::now()->subDays(120),
                'event_time' => '1:00 PM - 5:00 PM',
                'location' => 'Digital Arts Center, Brooklyn',
                'event_type' => 'past',
                'max_attendees' => 30,
                'image_path' => 'events/lightroom_workshop.jpg'
            ]
        ];
        
        foreach ($events as $event) {
            Event::create($event);
        }
    }
}