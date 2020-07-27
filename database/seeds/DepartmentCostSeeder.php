<?php

use Illuminate\Database\Seeder;
use App\DepartmentCost;

class DepartmentCostSeeder extends Seeder
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
                'name' => 'Oncology',
                'cost_description' => 'USD 2,500 to 10,000'
            ],
            [
                'name' => 'Ophthalmology',
                'cost_description' => 'USD 1,500 to 8,000'
            ],
            [
                'name' => 'Urology',
                'cost_description' => 'USD 4,000 to 15,500'
            ],
            [
                'name' => 'Orthopaedics',
                'cost_description' => 'USD 4,000 to 15,000'
            ],
            [
                'name' => 'Bariatric',
                'cost_description' => 'USD 4,000 to 16,000'
            ],
            [
                'name' => 'Cardiology',
                'cost_description' => 'USD 5,000 to 50,000'
            ],
            [
                'name' => 'Transplant',
                'cost_description' => 'USD 4,000 to 15,000'
            ],
            [
                'name' => 'Haematology',
                'cost_description' => 'USD 12,500 to 45,000'
            ],
            [
                'name' => 'Neurology & Spine',
                'cost_description' => 'USD 4,000 to 20,000'
            ],
            [
                'name' => 'ENT',
                'cost_description' => 'USD 1,000 to 16,000'
            ],
            [
                'name' => 'Dental Treatment',
                'cost_description' => 'USD 1,000 to 7,500'
            ],
            [
                'name' => 'Body Contouring',
                'cost_description' => 'USD 8,000 to 20,000'
            ],
            [
                'name' => 'Infertility',
                'cost_description' => 'USD 3,8000 to 15,000'
            ],
            [
                'name' => 'Gynaecology',
                'cost_description' => 'USD 4,500 to 35,000'
            ],
            [
                'name' => null,
                'cost_description' => null
            ]
        ];

        foreach($data as $value) {
            DepartmentCost::create([
                'name'     => $value['name'],
                'cost_description' => $value['cost_description']
            ]);
        }
    }
}
