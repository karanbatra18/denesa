<?php

use Illuminate\Database\Seeder;
use App\Vision;

class VisionSeeder extends Seeder
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
                'title' => 'Our Mission',
                'description' => 'To serve our clients with the best options to go for their treatment. To make them available with top-notch medical specialists and hospitalisation in India. We make sure that patients visiting from different countries get the best quality of therapeutics within their budget.',
                'featured_image' => 'assets/images/mission.png'
            ],
            [
                'title' => 'Our Vision',
                'description' => 'Fronting as a leading and most trusted medical tourism service provider. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type.',
                'featured_image' => 'assets/images/vision.png'
            ]
        ];

        foreach ($data as $value) {
            Vision::create([
                'title' => $value['title'],
                'description' => $value['description'],
                'featured_image' => $value['featured_image']
            ]);
        }
    }
}
