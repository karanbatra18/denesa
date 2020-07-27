<?php

use Illuminate\Database\Seeder;
use App\AboutIntroduction;

class AboutIntroductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'description' => 'Health and Tourism can work well if you get the right assistance for places, doctors, treatment schedule, accommodation and cost of treatment involved. Do not hassle and be carefree while you are planning for your medical tourism. Denesa is here to expect the best for medical travellers. Neither the mental stress nor physical exertion is good for the patient. So, why to worry about that when your all-time medical tourism partner Denesa Health is with you be it a well-planned surgery or travel in case of emergency. Contact Denesa Health to avail of different kinds of Medical Tourism requirements. You take care of your health and focus on getting better with every day.'
        ];

        AboutIntroduction::create([
            'description' => $data['description']
        ]);
    }
}
