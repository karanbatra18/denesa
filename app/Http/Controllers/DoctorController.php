<?php

namespace App\Http\Controllers;

use App\Treatment;
use Illuminate\Http\Request;
use App\Doctor;
use App\Hospital;
use App\Category;
use App\State;
use App\City;
use DB;
use Cache;
use Config;
use Illuminate\Support\Carbon;

class DoctorController extends Controller
{
    /**
     * Display a listing of the active resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $treatmentQuery =  $request->treatment ?? null;
        $specialityQuery =  $request->speciality ?? null;
        $cityQuery =  $request->city ?? null;

        $cityCondition = $cityQuery ? ['city' => $cityQuery] : [];
        $cities = City::all();
        $treatments = Treatment::all();

        if($treatmentQuery) {
            $treatment = Treatment::where(['slug' => $treatmentQuery])->first();
            $doctorIds = $treatment->doctors()->get()->pluck('id')->toArray();
        } else {
            $doctorIds = Doctor::get()->pluck('id')->toArray();
        }

        if($specialityQuery) {
            $doctors = Doctor::where($cityCondition)->where('speciality', 'like', '%' . $specialityQuery . '%')->whereIn('id', $doctorIds)->paginate(10);
            $topDoctors  = Doctor::where('is_featured',1)->where($cityCondition)->where('speciality', 'like', '%' . $specialityQuery . '%')->whereIn('id', $doctorIds)->limit(10)->get();
        } else {
            $doctors = Doctor::where($cityCondition)->whereIn('id', $doctorIds)->paginate(10);
            $topDoctors  = Doctor::where('is_featured',1)->where($cityCondition)->whereIn('id', $doctorIds)->limit(10)->get();
        }

        //dd($topDoctors);
        return view('doctor.index', compact('doctors','cities', 'treatments', 'specialityQuery', 'cityQuery', 'treatmentQuery', 'topDoctors'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $doctor = Doctor::where(['slug' => $slug])->first();
        return view('doctor.show', compact('doctor'));
    }
}
