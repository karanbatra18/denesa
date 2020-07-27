<?php

use App\FooterDoctor;
use App\FooterHospital;
use App\FooterIntroduction;
use App\FooterService;
use App\SocialLink;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hospitalsData = [
            [
                'name' => 'Medanta The Medicity',
                'link' => 'javascript:;',
                'place' => 'Gurugram'
            ],
            [
                'name' => 'Artemis Hospital',
                'link' => 'javascript:;',
                'place' => 'Gurugram'
            ],
            [
                'name' => 'Max Super Speciality Hospital',
                'link' => 'javascript:;',
                'place' => 'New Delhi'
            ], [
                'name' => 'Fortis Memorial Research Institute',
                'link' => 'javascript:;',
                'place' => 'Gurugram'
            ],
            [
                'name' => 'Fortis Hospital',
                'link' => 'javascript:;',
                'place' => 'Noida'
            ],
            [
                'name' => 'Fortis Memorial Research Institute',
                'link' => 'javascript:;',
                'place' => 'Mulund'
            ],
            [
                'name' => 'Fortis Escorts Heart Institute',
                'link' => 'javascript:;',
                'place' => 'New Delhi'
            ], [
                'name' => 'Fortis Hospital',
                'link' => 'javascript:;',
                'place' => 'Kolkata'
            ]
        ];

        $doctorsData = [
            [
                'name' => 'Dr Sandeep Vaishya',
                'link' => 'javascript:;',
                'place' => 'Gurugram'
            ],
            [
                'name' => 'Dr I P S Oberoi',
                'link' => 'javascript:;',
                'place' => 'Gurugram'
            ],
            [
                'name' => 'Dr Hitesh Garg',
                'link' => 'javascript:;',
                'place' => 'Gurugram'
            ],
            [
                'name' => 'Dr K K Handa',
                'link' => 'javascript:;',
                'place' => 'Gurugram'
            ], [
                'name' => 'Dr A S Soin',
                'link' => 'javascript:;',
                'place' => 'Gurugram'
            ], [
                'name' => 'Dr Rahul Bhargava',
                'link' => 'javascript:;',
                'place' => 'Gurugram'
            ], [
                'name' => 'Dr Dinesh Khullar',
                'link' => 'javascript:;',
                'place' => 'Gurugram'
            ], [
                'name' => 'Dr K R Balakrishnan',
                'link' => 'javascript:;',
                'place' => 'Chennai'
            ],
            [
                'name' => 'Dr Vinod Raina',
                'link' => 'javascript:;',
                'place' => 'Gurugram'
            ],
            [
                'name' => 'Dr Hrishikesh Dattatraya Pai',
                'link' => 'javascript:;',
                'place' => 'Gurugram'
            ], [
                'name' => 'Dr Refai Showkathali',
                'link' => 'javascript:;',
                'place' => 'Chennai'
            ],


        ];

        $serviceData = [
            [
                'name' => 'Free Quote & Opinion from Best Hospitals',
                'link' => 'javascript:;'
            ],
            [
                'name' => 'Get appointment from India’s best doctor',
                'link' => 'javascript:;'
            ],
            [
                'name' => 'Booking your Accommodatio near Hospitals',
                'link' => 'javascript:;'
            ],
            [
                'name' => 'Free consultation before arriving.',
                'link' => 'javascript:;'
            ],
            [
                'name' => 'Language Interpreter.',
                'link' => 'javascript:;'
            ],
            [
                'name' => 'Visa Assistance.',
                'link' => 'javascript:;'
            ], [
                'name' => 'Forex Services.',
                'link' => 'javascript:;'
            ],
            [
                'name' => 'Providing Letter for Medical Visa.',
                'link' => 'javascript:;'
            ],
            [
                'name' => 'Logistical Support',
                'link' => 'javascript:;'
            ],
            [
                'name' => 'Accompanying during & after treatment.',
                'link' => 'javascript:;'
            ],
            [
                'name' => 'Arranging pick-up and drop.',
                'link' => 'javascript:;'
            ],
        ];

        foreach ($hospitalsData as $hospital) {
            FooterHospital::create($hospital);
        }

        foreach ($doctorsData as $value) {
            FooterDoctor::create($value);
        }

        foreach ($serviceData as $value) {
            FooterService::create($value);
        }

        $footerIntroduction =  new FooterIntroduction();
        $footerIntroduction->description = 'We are a promising medical tourism company who is working exponentially in medical spectrum and providing the medical aid to the people overseas.';
        $footerIntroduction->address = '4-B, Tower A, Ground Floor, Unitech CyberPark, <br>Sector 39, Gurgaon, Haryana 122003';
        $footerIntroduction->phone = '(+91) 74282 31453';
        $footerIntroduction->email1 = 'info@denesahealth.com';
        $footerIntroduction->email2 = 'saurabh.chandna@denesahealth.com';
        $footerIntroduction->hospital_heading = 'OUR HOSPITALS';
        $footerIntroduction->doctor_heading = 'TOP DOCTORS';
        $footerIntroduction->service_heading = 'OUR SERVICES';
        $footerIntroduction->save();

        $socialLink =  new SocialLink();
        $socialLink->facebook_url = 'https://www.facebook.com/';
        $socialLink->twitter_url = 'https://twitter.com/';
        $socialLink->linkedin_url = 'https://www.linkedin.com/';
        $socialLink->instagram_url = 'https://www.instagram.com/';
        $socialLink->copyright_text = '2020 Denesa Health. All Rights Reserved.';
        $socialLink->save();

    }
}
