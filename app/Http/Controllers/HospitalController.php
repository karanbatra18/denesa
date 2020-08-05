<?php

namespace App\Http\Controllers;

use App\Treatment;
use Illuminate\Http\Request;

use App\Doctor;
use App\Hospital;
use App\Category;
use App\State;
use App\City;

class HospitalController extends Controller
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
            $hospitalIds = $treatment->hospitals()->get()->pluck('id')->toArray();
        } else {
            $hospitalIds = Hospital::get()->pluck('id')->toArray();
        }

        if($specialityQuery) {
            $hospitals = Hospital::where($cityCondition)->where('speciality', 'like', '%' . $specialityQuery . '%')->whereIn('id', $hospitalIds)->paginate(2);
        } else {
            $hospitals = Hospital::where($cityCondition)->whereIn('id', $hospitalIds)->paginate(2);
        }


        return view('hospital.index', compact('hospitals','cities', 'treatments', 'specialityQuery', 'cityQuery', 'treatmentQuery'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $hospital = Hospital::where(['slug' => $slug])->first();
        $doctors = $hospital->doctors()->get();
        return view('hospital.show', compact('hospital','doctors'));
    }
}
