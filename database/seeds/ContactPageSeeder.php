<?php

use App\CallSale;
use App\ContactSupport;
use Illuminate\Database\Seeder;

class ContactPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ContactSupportData = [
            'support_text' => 'Existing customer & need help with a product? We’re here to help.',
            'support_browse_text' => 'Browse Support Library',
            'support_email_id' => 'info@denesahealth.com',
            'support_link' => '#',
            'support_whatsapp' => null,
            'support_email' => null,
            'support_call' => null,
            'general_text' => 'Explore career opportunities, partner with us or ask
anything else..',
            'general_browse_text' => 'Browse All Job Openings',
            'general_email_id' => 'info@denesahealth.com',
            'general_link' => '#',
            'general_whatsapp' => '',
            'general_email' => '',
            'general_call' => '',
        ];

        ContactSupport::create($ContactSupportData);

        $data = [
            [
                'place' => 'Delhi-India',
                'address' => '4B-Tower A, Ground Floor, Unitech Cyber Park, Sector 39,
Gurugram, Haryana 122003',
                'phone' => '+91-7428231453',
            ],
            [
                'place' => 'Delhi-India',
                'address' => '4B-Tower A, Ground Floor, Unitech Cyber Park, Sector 39,
Gurugram, Haryana 122003',
                'phone' => '+91-7428231453',
            ]
        ];

        foreach($data as $value) {
            CallSale::create($value);
        }

    }
}
