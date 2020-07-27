<?php

use App\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'banner_page_label' => 'Home Page',
                'banner_page' => 'home_page',
                'featured_image' => '/assets/images/bg-layer.jpg'
            ],
            [
                'banner_page_label' => 'Hospitals Page',
                'banner_page' => 'hospital_page',
                'featured_image' => '/assets/images/bg-layer.jpg'
            ],
            [
                'banner_page_label' => 'Doctors Page',
                'banner_page' => 'doctor_page',
                'featured_image' => '/assets/images/bg-layer.jpg'
            ],
            [
                'banner_page_label' => 'Costs Page',
                'banner_page' => 'cost_page',
                'featured_image' => '/assets/images/bg-layer.jpg'
            ],
            [
                'banner_page_label' => 'Knowledge Center Page',
                'banner_page' => 'knowledge_center_page',
                'featured_image' => '/assets/images/bg-layer.jpg'
            ],
            [
                'banner_page_label' => 'Testimonial Page',
                'banner_page' => 'testimonial_page',
                'featured_image' => '/assets/images/bg-layer.jpg'
            ],
            [
                'banner_page_label' => 'Blog Page',
                'banner_page' => 'blog_page',
                'featured_image' => '/assets/images/bg-layer.jpg'
            ],
            [
                'banner_page_label' => 'About Page',
                'banner_page' => 'about_page',
                'featured_image' => '/assets/images/bg-layer.jpg'
            ],
            [
                'banner_page_label' => 'Contact Us Page',
                'banner_page' => 'contact_page',
                'featured_image' => '/assets/images/bg-layer.jpg'
            ],
        ];

        foreach ($data as $value) {
            Banner::create([
                'banner_page_label' => $value['banner_page_label'],
                'banner_page' => $value['banner_page'],
                'featured_image' => $value['featured_image']
            ]);
        }
    }
}
