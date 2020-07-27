<?php

use Illuminate\Database\Seeder;
use App\FeaturedHospital;

class FeaturedHospitalSeeder extends Seeder
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
                'featured_image' => 'assets/images/hospitals/img1.png',
            ],
            [
                'featured_image' => 'assets/images/hospitals/img2.png',
            ],
            [
                'featured_image' => 'assets/images/hospitals/img3.png',
            ],
            [
                'featured_image' => 'assets/images/hospitals/img4.png',
            ],
            [
                'featured_image' => 'assets/images/hospitals/img5.png',
            ],
            [
                'featured_image' => 'assets/images/hospitals/img6.png',
            ],
            [
                'featured_image' => 'assets/images/hospitals/img7.png',
            ],
            [
                'featured_image' => 'assets/images/hospitals/img8.png',
            ]
        ];

        foreach($data as $value) {
            FeaturedHospital::create([
                'featured_image' => $value['featured_image']
            ]);
        }
    }
}
