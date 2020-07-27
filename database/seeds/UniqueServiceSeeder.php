<?php

use App\UniqueService;
use Illuminate\Database\Seeder;

class UniqueServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'title' => 'Unique Services of Denesa Health Includes',
            'description' => '<p>Denesa Health has always been a choice for medical tourism because of the highly dedicated team that works with complete dedication to assisting the personalised
<br>requirements of the sufferer.

</p><p>Denesa Health can assist the customer expectation as it has a favourable association with:</p>'
        ];

        UniqueService::create([
            'title' => $data['title'],
            'description' => $data['description']
        ]);
    }
}
