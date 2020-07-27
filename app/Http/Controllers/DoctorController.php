<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $doctors = Doctor::paginate(2);
        return view('doctor.index', compact('doctors'));
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
