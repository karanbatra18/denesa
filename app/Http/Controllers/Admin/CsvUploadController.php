<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Doctor;
use App\Hospital;
use App\Http\Controllers\Controller;
use App\Treatment;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class CsvUploadController extends Controller
{
    public function uploadHospitals(Request $request)
    {
        return view('admin.csv_upload.hospitals');
    }

    public function storeHospitals(Request $request)
    {
        //dd($request->all());
        $path = $request->file('filename')->getRealPath();
        //dd($path);
        //$file = public_path('file/test.csv');

        $customerArr = $this->csvToArray1($path);
        // dd($customerArr);
        // for ($i = 0; $i < count($customerArr); $i++) {
        foreach ($customerArr as $customer) {

            $data = [
                'name' => $customer['name'] ?? null,
                'description' => $customer['description'] ?? null,
                'team_specialities' => $customer['team_specialities'] ?? null,
                'established' => $customer['established'] ?? null,
                'speciality' => $customer['speciality'] ?? null,
                'infrastructure' => $customer['infrastructure'] ?? null,
                'address' => $customer['address'] ?? null,
                'city' => $customer['city'] ?? null,
                'state' => $customer['state'] ?? null,
                'zip_code' => $customer['zip_code'] ?? null,
                'image' => $customer['image'] ?? null,
                'featured_image' => $customer['featured_image'] ?? null,
                'confirm_during_stay' => $customer['confirm_during_stay'] ?? null,
                'money_matters' => $customer['money_matters'] ?? null,
                'food' => $customer['food'] ?? null,
                'treatment_related' => $customer['treatment_related'] ?? null,
                'languauge' => $customer['languauge'] ?? null,
                'transportation' => $customer['transportation'] ?? null,
                'slug' => $customer['slug'] ?? null,
            ];
            Hospital::firstOrCreate($data);
        }

        dd('Jobi done or what ever');
    }

    public function uploadDoctors(Request $request)
    {
        return view('admin.csv_upload.doctors');
    }

    public function storeDoctors(Request $request)
    {
        $path = $request->file('filename')->getRealPath();
        $customerArr = $this->csvToArray1($path);

        foreach ($customerArr as $customer) {
           // dd($customer);
            $data = [
                'name' => $customer['name'] ?? null,
                'designation' => $customer['designation'] ?? null,
                'experience' => $customer['experience'] ?? null,
                'qualification' => $customer['qualification'] ?? null,
                'speciality' => $customer['speciality'] ?? null,
                'about' => $customer['about'] ?? null,
                'specialization' => $customer['specialization'] ?? null,
                'list_of_awards' => $customer['list_of_awards'] ?? null,
                'work_experience' => $customer['work_experience'] ?? null,
                'education_training' => $customer['education_training'] ?? null,
                'state' => $customer['state'] ?? null,
                'city' => $customer['city'] ?? null,
                'location' => $customer['location'] ?? null,
                'zip_code' => $customer['zip_code'] ?? null,
                'image' => $customer['image'] ?? null,
                'slug' => $customer['slug'] ?? null,
            ];
            if (isset($customer['category']) && !empty($customer['category'])) {
                $category = Category::firstOrCreate([
                    'name' => $customer['category'],
                    'type' => 'doctor',
                ]);

                $data['category_id'] = $category->id;
            }

            if (isset($customer['hospital']) && !empty($customer['hospital'])) {
                $hospital = Hospital::firstOrCreate([
                    'name' => trim($customer['name'])
                ]);

                $data['hospital_id'] = $hospital->id;
            }

            Doctor::firstOrCreate($data);
        }

       return redirect()->back();
    }

    public function uploadTreatments(Request $request)
    {
        return view('admin.csv_upload.treatments');
    }

    public function storeTreatments(Request $request)
    {
        $path = $request->file('filename')->getRealPath();

        $customerArr = $this->csvToArray1($path);

        foreach ($customerArr as $customer) {

            $data = [
                'title' => $customer['title'] ?? null,
                'slug' => $customer['slug'] ?? null,
                'transplant_price' => $customer['transplant_price'] ?? null,
                'travellers_count' => $customer['travellers_count'] ?? null,
                'hospital_days_count' => $customer['hospital_days_count'] ?? null,
                'days_outside_count' => $customer['days_outside_india'] ?? null,
                'total_days_count' => $customer['total_days_in_india'] ?? null,
                'introduction' => $customer['introduction'] ?? null,
                'cost' => $customer['cost'] ?? null,
                'featured_image' => $customer['featured_image'] ?? null,

            ];

            if (isset($customer['category']) && !empty($customer['category'])) {
                $category = Category::firstOrCreate([
                    'name' => $customer['category'],
                    'type' => 'treatment',
                ]);

                $data['category_id'] = $category->id;
            }

            $treatment = Treatment::firstOrCreate($data);

            if(!empty($customer['doctors'])) {
                $doctors  = explode(',', $customer['doctors']);
                $doctorsArray = Doctor::whereIn('name',$doctors)->get()->pluck('id')->toArray();
                $treatment->doctors()->attach($doctorsArray);
            }

            if(!empty($customer['hospitals'])) {
                $hospitals  = explode(',', $customer['hospitals']);
                $hospitalsArray = Hospital::whereIn('name',$hospitals)->get()->pluck('id')->toArray();
                $treatment->hospitals()->attach($hospitalsArray);
            }


            if(!empty($customer['specifications_titles'])) {
                $specificationsTitles  = explode(',', $customer['specifications_titles']);
                $specificationsDescriptions  = explode('#', $customer['specifications_descriptions']);
                if(count($specificationsTitles)) {
                    for($i=0; $i <= count($specificationsTitles); $i++) {
                        $specs = [
                            'title' => $specificationsTitles[0],
                            'description' => $specificationsDescriptions[0],
                        ];
                        $treatment->specifications()->create($specs);
                    }
                }

            }

            if(!empty($customer['faqs'])) {
                $faqsTitles  = explode(',', $customer['faqs_titles']);
                $faqsDescriptions  = explode('#', $customer['faqs_descriptions']);
                if(count($faqsTitles)) {
                    for($i=0; $i <= count($faqsTitles); $i++) {
                        $faq = [
                            'title' => $faqsTitles[0],
                            'description' => $faqsDescriptions[0],
                        ];
                        $treatment->faqs()->create($faq);
                    }
                }

            }

        }

        return redirect()->back();
    }


    public function csvToArray1($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header)
                    $header = $row;
                else

                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }
}