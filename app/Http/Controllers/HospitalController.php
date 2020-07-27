<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $hospitals = Hospital::paginate(2);
        return view('hospital.index', compact('hospitals'));
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
