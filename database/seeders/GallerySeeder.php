<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    public function run()
    {
        $galleries = [
            [
                'title' => 'Golden Hour Wedding',
                'description' => 'Beautiful sunset wedding ceremony at the beach',
                'image_path' => 'gallery/sample1.jpg',
                'featured' => true
            ],
            [
                'title' => 'Corporate Headshots',
                'description' => 'Professional business portraits for executive team',
                'image_path' => 'gallery/sample2.jpg',
                'featured' => true
            ],
            [
                'title' => 'Family Portrait Session',
                'description' => 'Outdoor family photography in the park',
                'image_path' => 'gallery/sample3.jpg',
                'featured' => false
            ],
            [
                'title' => 'Fashion Editorial',
                'description' => 'Urban fashion photography for magazine spread',
                'image_path' => 'gallery/sample4.jpg',
                'featured' => true
            ],
            [
                'title' => 'Engagement Photo Shoot',
                'description' => 'Romantic couples photography session',
                'image_path' => 'gallery/sample5.jpg',
                'featured' => false
            ],
            [
                'title' => 'Product Photography',
                'description' => 'Commercial product shots for e-commerce',
                'image_path' => 'gallery/sample6.jpg',
                'featured' => true
            ],
            [
                'title' => 'Birthday Party Coverage',
                'description' => 'Fun and energetic party event photography',
                'image_path' => 'gallery/sample7.jpg',
                'featured' => false
            ],
            [
                'title' => 'Maternity Session',
                'description' => 'Beautiful maternity portraits capturing expecting mothers',
                'image_path' => 'gallery/sample8.jpg',
                'featured' => true
            ],
            [
                'title' => 'Architecture Photography',
                'description' => 'Modern architectural photography of commercial buildings',
                'image_path' => 'gallery/sample9.jpg',
                'featured' => false
            ],
            [
                'title' => 'Food Photography',
                'description' => 'Culinary photography for restaurant menu',
                'image_path' => 'gallery/sample10.jpg',
                'featured' => true
            ],
            [
                'title' => 'Graduation Photos',
                'description' => 'Memorable graduation portraits for students',
                'image_path' => 'gallery/sample11.jpg',
                'featured' => false
            ],
            [
                'title' => 'Sports Action Shots',
                'description' => 'Dynamic sports photography capturing athletic moments',
                'image_path' => 'gallery/sample12.jpg',
                'featured' => false
            ],
            [
                'title' => 'Newborn Photography',
                'description' => 'Tender newborn portraits in studio setting',
                'image_path' => 'gallery/sample13.jpg',
                'featured' => true
            ],
            [
                'title' => 'Concert Photography',
                'description' => 'Live music event photography with dramatic lighting',
                'image_path' => 'gallery/sample14.jpg',
                'featured' => false
            ],
            [
                'title' => 'Nature Landscapes',
                'description' => 'Breathtaking landscape photography from mountain ranges',
                'image_path' => 'gallery/sample15.jpg',
                'featured' => false
            ]
        ];
        
        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}