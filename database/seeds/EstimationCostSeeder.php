<?php

use Illuminate\Database\Seeder;
use App\EstimationCost;

class EstimationCostSeeder extends Seeder
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
                'title' => 'Estimated Cost of Treatment in India',
                'description' => 'The cost of treatment in India is almost half of the price of treatment in other countries. If you compare it to the nations who are best in providing the medical treatment, like the US and UK, you will notice there is a huge difference maybe you have to pay only one-third or one-fourth amount of overall expenses there.',
                'featured_image' => 'assets/images/estimated-image.jpg'
            ]
        ];

        foreach($data as $value) {
            EstimationCost::create([
                'title'     => $value['title'],
                'description' => $value['description'],
                'featured_image' => $value['featured_image']
            ]);
        }
    }
}
