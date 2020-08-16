<?php

namespace App\Http\Controllers\Admin;

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
                'hospital_id' => $customer['hospital_id'] ?? null,
                'category_id' => $customer['category_id'] ?? null,
            ];
            Doctor::firstOrCreate($data);
        }

        dd('Jobi done or what ever');
    }

    public function uploadTreatments(Request $request)
    {
        return view('admin.csv_upload.doctors');
    }

    public function storeTreatments(Request $request)
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
                'title' => $customer['title'] ?? null,
                'slug' => $customer['slug'] ?? null,
                'transplant_price' => $customer['transplant_price'] ?? null,
                'travellers_count' => $customer['travellers_count'] ?? null,
                'hospital_days_count' => $customer['hospital_days_count'] ?? null,
                'days_outside_count' => $customer['days_outside_count'] ?? null,
                'total_days_count' => $customer['total_days_count'] ?? null,
                'introduction' => $customer['introduction'] ?? null,
                'cost' => $customer['cost'] ?? null,
                'featured_image' => $customer['featured_image'] ?? null,
                'category_id' => $customer['category_id'] ?? null

            ];
            Treatment::firstOrCreate($data);
        }

        dd('Jobi done or what ever');
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