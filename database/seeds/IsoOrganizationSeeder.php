<?php

use App\IsoOrganization;
use Illuminate\Database\Seeder;

class IsoOrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'title' => 'An ISO Certified Organization',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'featured_image' => 'assets/images/iso.png'
        ];

        IsoOrganization::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'featured_image' => $data['featured_image'],
        ]);
    }
}
