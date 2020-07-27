<?php

use Illuminate\Database\Seeder;
use App\TopDoctor;

class TopDoctorSeeder extends Seeder
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
                'name' => 'Dr I P S Oberoi',
                'designation' => 'Head : Orthopaedics & Chief : Joint Replacement & Arthroscopy',
                'featured_image' => 'assets/images/doctors/img1.jpg'
            ],
            [
                'name' => 'Dr Sandeep Vtaishya',
                'designation' => 'Director: Neuro & Spine Surgery',
                'featured_image' => 'assets/images/doctors/img2.jpg'
            ],
            [
                'name' => 'Dr Hitesh Garg',
                'designation' => 'Sr. Consultant & Head (Unit- IV)',
                'featured_image' => 'assets/images/doctors/img3.jpg'
            ],
            [
                'name' => 'Dr K K Handa',
                'designation' => 'Chairman : ENT & Head Neck Surgery',
                'featured_image' => 'assets/images/doctors/img4.jpg'
            ],
            [
                'name' => 'Dr I P S Oberoi',
                'designation' => 'Head : Orthopaedics & Chief : Joint Replacement & Arthroscopy',
                'featured_image' => 'assets/images/doctors/img1.jpg'
            ],
            [
                'name' => 'Dr Sandeep Vtaishya',
                'designation' => 'Director: Neuro & Spine Surgery',
                'featured_image' => 'assets/images/doctors/img2.jpg'
            ],
            [
                'name' => 'Dr Hitesh Garg',
                'designation' => 'Sr. Consultant & Head (Unit- IV)',
                'featured_image' => 'assets/images/doctors/img3.jpg'
            ],
            [
                'name' => 'Dr K K Handa',
                'designation' => 'Chairman : ENT & Head Neck Surgery',
                'featured_image' => 'assets/images/doctors/img4.jpg'
            ],
            [
                'name' => 'Dr I P S Oberoi',
                'designation' => 'Head : Orthopaedics & Chief : Joint Replacement & Arthroscopy',
                'featured_image' => 'assets/images/doctors/img1.jpg'
            ],
            [
                'name' => 'Dr Sandeep Vtaishya',
                'designation' => 'Director: Neuro & Spine Surgery',
                'featured_image' => 'assets/images/doctors/img2.jpg'
            ]
        ];

        foreach($data as $value) {
            TopDoctor::create([
                'name'     => $value['name'],
                'designation' => $value['designation'],
                'featured_image' => $value['featured_image']
            ]);
        }
    }
}
