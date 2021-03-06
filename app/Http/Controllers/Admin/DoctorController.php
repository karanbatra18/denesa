<?php

namespace App\Http\Controllers\Admin;

use App\SiteModule;
use App\Speciality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $doctors = Doctor::get();
        return view('admin.doctor.index', compact('doctors'));
    }

    /**
     * Display a listing of the Trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $doctors = Doctor::onlyTrashed()->get();
        return view('admin.doctor.index', compact('doctors'));
    }

    public function backToList(Request $request)
    {
        $id = $request->input('id');

        Doctor::whereId($id)->restore();
        $queries = DB::getQueryLog();

        return redirect()->route('doctor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $getModule = SiteModule::where('name','Doctors')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_write == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('dashboard')->with($response);
            }
        }

        $hospitals = Hospital::get();
        $categories = Category::where(['type'=>'doctor'])->get();
        $doctorSpecialities = Speciality::where(['type'=>'doctor'])->get();
        $states = State::get();
        $cities = [];
        return view('admin.doctor.create', compact('hospitals', 'categories', 'states', 'cities', 'doctorSpecialities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3|max:255',
            //'slug' => 'required|unique:doctors',
            'designation' => 'required|min:1',
            'experience' => 'required',
            'qualification' => 'required|min:1',
            'speciality' => 'required|min:1',
            'state' => 'required',
            'city' => 'required',
        ]);

        $data = $request->all();

        if(isset($data['qualification']))
        {
            $qualification = $data['qualification'];
            unset($data['qualification']);
            $data['qualification'] = implode(',', $qualification);
        }

        if(isset($data['speciality']))
        {
            $speciality = $data['speciality'];
            unset($data['speciality']);
            $data['speciality'] = implode(',', $speciality);
        }

        Doctor::create($data);

        return redirect()->route('doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('admin.doctor.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $user = auth()->user();
        $getModule = SiteModule::where('name','Doctors')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_edit == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('dashboard')->with($response);
            }
        }

        $hospitals = Hospital::get();
        $categories = Category::where(['type'=>'doctor'])->get();
        $doctorSpecialities = Speciality::where(['type'=>'doctor'])->get();
        $states = State::get();
        $state = State::where(['name' => $doctor->state])->first();
        $cities = City::where('state_id', $state->id)->get();
        return view('admin.doctor.create', compact('doctor', 'hospitals', 'categories', 'states', 'cities', 'doctorSpecialities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       // dd($slug);
        $validateData = $request->validate([
            'name' => 'required|min:3|max:255',
            'slug' => 'required|unique:doctors,slug,'.$id,
            'designation' => 'required|min:3|max:255',
            'experience' => 'required',
            'qualification' => 'required|min:1',
            'speciality' => 'required|min:1',
            'state' => 'required',
            'city' => 'required',
        ]);

        $data = $request->except(['_token', '_method']);

        if($data['image']==null)
        {
           
            unset($data['image']);
           
        }
        if(isset($data['qualification']))
        {
            $qualification = $data['qualification'];
            unset($data['qualification']);
            $data['qualification'] = implode(',', $qualification);
        }

        if(isset($data['speciality']))
        {
            $speciality = $data['speciality'];
            unset($data['speciality']);
            $data['speciality'] = implode(',', $speciality);
        }

        Doctor::whereId($id)->update($data);

        return redirect()->route('doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $user = auth()->user();
        $getModule = SiteModule::where('name','Doctors')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_delete == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('dashboard')->with($response);
            }
        }

        $doctor->delete();
        return redirect()->route('doctor.index');
    }      
}
