<?php

use App\DenesaObjective;
use Illuminate\Database\Seeder;

class DenesaObjectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'title' => 'The Objective of Denesa Health',
            'description' => '<p>To facilitate the patients with the best quality doctoring for their illness. We help our customers with:</p><ul class="list-unstyled ul_list">
			   <li class="mb-3">Getting the exaction about the cost of treatment.</li>
			   <li class="mb-3">Getting the treatment done at the earliest possible.</li>
			   <li class="mb-3">To fix an appointment with the appropriate surgeon as per the convenience at both the ends.</li>
			   <li class="mb-3">Assistance with language translators.</li>
			   <li class="mb-3">Helping with foreign travel and visa formalities.</li>
			   <li class="mb-3">To accomplish all the formalities before, during and after the therapy.</li>
			   <li class="mb-3">Arranging for remote consultation.</li>
			   <li class="mb-3">Currency exchange.</li>
			   <li class="mb-3">Travel arrangements and booking.</li>
			   <li class="mb-3">Regular follow up post surgery for the recovery.</li>
			   <li class="mb-3">Finding the nearest accommodation and food for patients and family.</li>
			</ul><p>Presently, Denesa Health helps outpatient from countries including Cambodia, Kenya, Liberia, Morocco, Mozambique, Nigeria, Sierra Leone, Somalia, Sudan, Tanzania, Uganda, and Zimbabwe to find the excellent solution to their aids in India.</p>'
        ];

        DenesaObjective::create([
            'title' => $data['title'],
            'description' => $data['description']
        ]);
    }
}
