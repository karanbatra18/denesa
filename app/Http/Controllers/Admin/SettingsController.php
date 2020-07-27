<?php

namespace App\Http\Controllers\Admin;

use App\FooterDoctor;
use App\FooterHospital;
use App\FooterIntroduction;
use App\FooterService;
use App\SocialLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function editFooter()
    {
        $footerIntroduction =  FooterIntroduction::first();
        $socialLinks = SocialLink::first();
        $footerDoctors = FooterDoctor::get();
        $footerServices = FooterService::get();
        $footerHospitals = FooterHospital::get();
        return view('admin.setting.footer.edit', compact('socialLinks','footerDoctors','footerServices','footerHospitals','footerIntroduction'));
    }

    public function updateFooter(Request $request)
    {
       // dd($request->all());

        $socialLink =  SocialLink::first();
        if(!empty($socialLink)) {
            $socialLink->facebook_url = $request->facebook_url;
            $socialLink->twitter_url = $request->twitter_url;
            $socialLink->linkedin_url = $request->linkedin_url;
            $socialLink->instagram_url = $request->instagram_url;
            $socialLink->copyright_text = $request->copyright_text;
            $socialLink->save();
        } else {
            $socialLink =  new SocialLink();
            $socialLink->facebook_url = $request->facebook_url;
            $socialLink->twitter_url = $request->twitter_url;
            $socialLink->linkedin_url = $request->linkedin_url;
            $socialLink->instagram_url = $request->instagram_url;
            $socialLink->copyright_text = $request->copyright_text;
            $socialLink->save();
        }

        $footerIntroduction =  FooterIntroduction::first();
        if(!empty($footerIntroduction)) {
            $footerIntroduction->description = $request->description;
            $footerIntroduction->address = $request->address;
            $footerIntroduction->phone = $request->phone;
            $footerIntroduction->email1 = $request->email1;
            $footerIntroduction->email2 = $request->email2;
            $footerIntroduction->hospital_heading = $request->hospital_heading;
            $footerIntroduction->doctor_heading = $request->doctor_heading;
            $footerIntroduction->service_heading = $request->service_heading;
            $footerIntroduction->save();
        } else {
            $footerIntroduction =  new FooterIntroduction();
            $footerIntroduction->description = $request->description;
            $footerIntroduction->address = $request->address;
            $footerIntroduction->phone = $request->phone;
            $footerIntroduction->email1 = $request->email1;
            $footerIntroduction->email2 = $request->email2;
            $footerIntroduction->hospital_heading = $request->hospital_heading;
            $footerIntroduction->doctor_heading = $request->doctor_heading;
            $footerIntroduction->service_heading = $request->service_heading;
            $footerIntroduction->save();
        }

        if (!empty($request->footerDoctorsOld)) {

            FooterDoctor::truncate();

            foreach ($request->footerDoctorsOld as $key => $value) {

                $data = [
                    'name' => $value['name'] ?? null,
                    'link' => $value['link'] ?? null,
                    'place' => $value['place'] ?? null
                ];

                FooterDoctor::create($data);
            }
        }

        if (!empty($request->footerDoctors)) {

            foreach ($request->footerDoctors as $key => $value) {

                $data = [
                    'name' => $value['name'] ?? null,
                    'link' => $value['link'] ?? null,
                    'place' => $value['place'] ?? null
                ];

                FooterDoctor::create($data);
            }
        }

        if (!empty($request->footerServiceOld)) {

            FooterService::truncate();

            foreach ($request->footerServiceOld as $key => $value) {

                $data = [
                    'name' => $value['name'] ?? null,
                    'link' => $value['link'] ?? null
                ];

                FooterService::create($data);
            }
        }

        if (!empty($request->footerService)) {

            foreach ($request->footerService as $key => $value) {

                $data = [
                    'name' => $value['name'] ?? null,
                    'link' => $value['link'] ?? null
                ];

                FooterService::create($data);
            }
        }

        if (!empty($request->footerHospitalsOld)) {

            FooterHospital::truncate();

            foreach ($request->footerHospitalsOld as $key => $value) {

                $data = [
                    'name' => $value['name'] ?? null,
                    'link' => $value['link'] ?? null,
                    'place' => $value['place'] ?? null
                ];

                FooterHospital::create($data);
            }
        }

        if (!empty($request->footerHospitals)) {

            foreach ($request->footerHospitals as $key => $value) {

                $data = [
                    'name' => $value['name'] ?? null,
                    'link' => $value['link'] ?? null,
                    'place' => $value['place'] ?? null
                ];

                FooterHospital::create($data);
            }
        }

        return redirect()->back()->withSuccess('Successfully Updated');
    }
}
