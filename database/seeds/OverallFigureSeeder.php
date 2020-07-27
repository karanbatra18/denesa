<?php

use Illuminate\Database\Seeder;
use App\OverallFigure;

class OverallFigureSeeder extends Seeder
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
                'title' => 'SURGERIES',
                'total_count' => 1800,
                'featured_image' => 'assets/images/surgeries.png'
            ],
            [
                'title' => 'TREATMENTS',
                'total_count' => 300,
                'featured_image' => 'assets/images/treatment.png'
            ],
        ];

        foreach($data as $value) {
            OverallFigure::create([
                'title'     => $value['title'],
                'total_count' => $value['total_count'],
                'featured_image' => $value['featured_image']
            ]);
        }
    }
}
