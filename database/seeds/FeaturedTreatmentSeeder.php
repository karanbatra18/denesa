<?php

use Illuminate\Database\Seeder;
use App\FeaturedTreatment;

class FeaturedTreatmentSeeder extends Seeder
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
                'title' => 'Liver Transplant',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.',
                'featured_image' => 'assets/images/feature/img1.jpg',
                'icon_image' => 'assets/images/liver.png'
            ],
            [
                'title' => 'Heart Transplant',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.',
                'featured_image' => 'assets/images/feature/img2.jpg',
                'icon_image' => 'assets/images/heart.png'
            ],
            [
                'title' => 'Kidney Transplant',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.',
                'featured_image' => 'assets/images/feature/img3.jpg',
                'icon_image' => 'assets/images/kidney.png'
            ],
            [
                'title' => 'IVF',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.',
                'featured_image' => 'assets/images/feature/img4.jpg',
                'icon_image' => 'assets/images/liver.png'
            ],
            [
                'title' => 'Liver Transplant',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.',
                'featured_image' => 'assets/images/feature/img5.jpg',
                'icon_image' => 'assets/images/heart.png'
            ],
            [
                'title' => 'Liver Transplant',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.',
                'featured_image' => 'assets/images/feature/img6.jpg',
                'icon_image' => 'assets/images/kidney.png'
            ]
        ];

        foreach($data as $value) {
            FeaturedTreatment::create([
                'title'     => $value['title'],
                'description' => $value['description'],
                'featured_image' => $value['featured_image'],
                'icon_image' => $value['icon_image']
            ]);
        }


    }
}
