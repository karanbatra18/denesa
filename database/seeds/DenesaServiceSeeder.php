<?php

use Illuminate\Database\Seeder;
use App\DenesaService;

class DenesaServiceSeeder extends Seeder
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
                'title' => 'EMERGENCY SERVICES',
                'description' => 'We take the greatest care of our clients during emergencies and empower them to recover from illness with ease completely.',
                'featured_image' => 'assets/images/emergency.png'
            ],
            [
                'title' => 'QUALIFIED DOCTORS',
                'description' => 'Our panel of 1200+ doctors are having great hands on experience on all the medical technicalities along with the complete knowledge of latest medical aid and treatment.',
                'featured_image' => 'assets/images/qualified.png'
            ],
            [
                'title' => '24/7 SUPPORT',
                'description' => 'We have 24/7 super active support system for the ease and convenience of our clients across globe',
                'featured_image' => 'assets/images/support.png'
            ],
            [
                'title' => 'CONTACT US',
                'description' => 'You can message us directly for gathering any medical information either about the best doctors or getting treatment suggestions for your medical issue.',
                'featured_image' => 'assets/images/contact.png'
            ]
        ];

        foreach($data as $value) {
            DenesaService::create([
                'title'     => $value['title'],
                'description' => $value['description'],
                'featured_image' => $value['featured_image']
            ]);
        }
    }
}
