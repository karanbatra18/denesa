<?php

use App\ServiceItem;
use Illuminate\Database\Seeder;

class ServiceItemSeeder extends Seeder
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
                'title' => 'HOSPITALS',
                'total_count' => 150,
                'featured_image' => 'assets/images/hospitals.png'
            ],
            [
                'title' => 'DOCTORS',
                'total_count' => 1000,
                'featured_image' => 'assets/images/doctor.png'
            ],
            [
                'title' => 'PROFESSIONALS',
                'total_count' => 500,
                'featured_image' => 'assets/images/treatment.png'
            ],
            [
                'title' => 'HOSPITAL ROOMS',
                'total_count' => 2000,
                'featured_image' => 'assets/images/rooms.png'
            ],
            [
                'title' => 'AMBULANCE',
                'total_count' => 50,
                'featured_image' => 'assets/images/ambulance.png'
            ],
            [
                'title' => 'CONTENTED PATIENTS',
                'total_count' => 400,
                'featured_image' => 'assets/images/wheel-chair.png'
            ],
        ];

        foreach($data as $value) {
            ServiceItem::create([
                'title'     => $value['title'],
                'total_count' => $value['total_count'],
                'featured_image' => $value['featured_image']
            ]);
        }
    }
}
