<?php

use Illuminate\Database\Seeder;
use App\CountryFlag;

class CountryFlagSeeder extends Seeder
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
                'name' => null,
                'featured_image' => 'assets/images/flag/icon1.jpg'
            ],
            [
                'name' => null,
                'featured_image' => 'assets/images/flag/icon2.jpg'
            ],
            [
                'name' => null,
                'featured_image' => 'assets/images/flag/icon3.jpg'
            ],
            [
                'name' => null,
                'featured_image' => 'assets/images/flag/icon4.jpg'
            ],
            [
                'name' => null,
                'featured_image' => 'assets/images/flag/icon5.jpg'
            ],
            [
                'name' => null,
                'featured_image' => 'assets/images/flag/icon6.jpg'
            ],
            [
                'name' => null,
                'featured_image' => 'assets/images/flag/icon7.jpg'
            ],
            [
                'name' => null,
                'featured_image' => 'assets/images/flag/icon8.jpg'
            ],
            [
                'name' => null,
                'featured_image' => 'assets/images/flag/icon9.jpg'
            ],
            [
                'name' => null,
                'featured_image' => 'assets/images/flag/icon10.jpg'
            ],
            [
                'name' => null,
                'featured_image' => 'assets/images/flag/icon11.jpg'
            ],
            [
                'name' => null,
                'featured_image' => 'assets/images/flag/icon12.jpg'
            ],
            [
                'name' => null,
                'featured_image' => 'assets/images/flag/icon13.jpg'
            ],
            [
                'name' => null,
                'featured_image' => 'assets/images/flag/icon14.jpg'
            ],
            [
                'name' => null,
                'featured_image' => 'assets/images/flag/icon15.jpg'
            ],
            [
                'name' => null,
                'featured_image' => 'assets/images/flag/icon16.jpg'
            ],
        ];

        foreach($data as $value) {
            CountryFlag::create([
                'name'     => $value['name'],
                'featured_image' => $value['featured_image']
            ]);
        }
    }
}
