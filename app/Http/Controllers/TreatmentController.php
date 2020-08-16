<?php

namespace App\Http\Controllers;

use App\AboutIntroduction;
use App\Category;
use App\DenesaObjective;
use App\DenesaService;
use App\Vision;
use Illuminate\Http\Request;

use App\Doctor;
use App\Hospital;
use App\Treatment;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the active resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //DB::connection()->enableQueryLog();
        /*$doctors = Cache::remember('doctors', Config::get('constants.seconds.one_second'), function () {
            return Doctor::get();
        });*/

        //$queries = DB::getQueryLog();

        //\Log::info($queries);

        $treatments = Treatment::get();
        return view('admin.treatment.index', compact('treatments'));
    }

    public function indexFront()
    {
        //DB::connection()->enableQueryLog();
        /*$doctors = Cache::remember('doctors', Config::get('constants.seconds.one_second'), function () {
            return Doctor::get();
        });*/

        //$queries = DB::getQueryLog();

        //\Log::info($queries);
        $aboutIntroduction = AboutIntroduction::first();
        $visions = Vision::get();
        $denesaObjective = DenesaObjective::first();
        $treatments = Treatment::get();
        $categories = Category::with('treatments')->where(['type' => 'treatment'])->get();
        $denesaServices = DenesaService::get();
        return view('treatment.index', compact('treatments', 'categories', 'aboutIntroduction', 'visions', 'denesaObjective', 'denesaServices'));
    }

    /**
     * Display a listing of the Trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $treatments = Treatment::onlyTrashed()->get();
        return view('admin.treatment.index', compact('treatments'));
    }

    public function backToList(Request $request)
    {
        $id = $request->input('id');
        Treatment::whereId($id)->restore();
        return redirect()->route('treatment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$hospitals = Hospital::get();
    	$doctors = Doctor::get();
        $categories = Category::where(['type' => 'treatment'])->get();

        return view('admin.treatment.create', compact('hospitals', 'doctors', 'categories'));
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
            'title' => 'required|min:3|max:150',
            'introduction' => 'required',
            //'specialization' => 'required',
          //  'specialization' => 'required',
            //'slug' => 'required|unique:doctors',
        ]);

        $data = $request->except('hospital_id', 'doctor_id', 'specifications', 'faqs');
        $treatment = Treatment::create($data);
        if(isset($request->specifications)) {
            foreach($request->specifications as $specs) {
                $treatment->specifications()->create($specs);
            }
        }

        if(isset($request->faqs)) {
            foreach($request->faqs as $faq) {
                $treatment->faqs()->create($faq);
            }
        }

        if(isset($request->hospital_id)) {
            $treatment->hospitals()->attach($request->hospital_id);
        }

        if(isset($request->doctor_id)) {
                $treatment->doctors()->attach($request->doctor_id);
        }

        return redirect()->route('treatment.index');
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $treatment = Treatment::whereSlug($slug)->first();
        return view('treatment.show', compact('treatment'));
    }

    /**
     * @param Treatment $treatment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Treatment $treatment)
    {
        $hospitals = Hospital::get();
        $doctors = Doctor::get();
        $categories = Category::where(['type' => 'treatment'])->get();
        $faqs = $treatment->faqs()->get();
        $specifications = $treatment->specifications()->get();
        $treatmentDoctors = $treatment->doctors()->get()->pluck('id')->toArray();
        $treatmentHospitals = $treatment->hospitals()->get()->pluck('id')->toArray();

        return view('admin.treatment.create', compact('treatment', 'hospitals', 'doctors', 'faqs', 'specifications', 'categories','treatmentDoctors','treatmentHospitals'));
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
        $validateData = $request->validate([
            'title' => 'required|min:3|max:150',
          //  'slug' => 'required|unique:treatments',
        ]);

        $data = $request->except('hospital_id', 'doctor_id', 'specifications', 'faqs');

        $treatment = Treatment::whereId($id)->first();
        $treatment->update($data);

        $treatment->specifications()->delete();
        if(isset($request->specifications)) {
            foreach($request->specifications as $specs) {
                $treatment->specifications()->create($specs);
            }
        }

        $treatment->faqs()->delete();
        if(isset($request->faqs)) {
            foreach($request->faqs as $faq) {
                $treatment->faqs()->create($faq);
            }
        }

        if(isset($request->hospital_id)) {
            $treatment->hospitals()->sync($request->hospital_id);
        }

        if(isset($request->doctor_id)) {
            $treatment->doctors()->sync($request->doctor_id);
        }

        return redirect()->route('treatment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treatment $treatment)
    {
        $treatment->delete();
        return redirect()->route('treatment.index');
    }

    public function getTreatments(Request $request)
    {
        $search = $request->search;

        if($search == ''){
            $treatments = Treatment::orderby('title','asc')->limit(5)->get();
        }else{
            $treatments = Treatment::orderby('title','asc')->where('title', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($treatments as $treatment){
          //  dd($treatment);
            $slug = route('treatment.showFront', ['slug' => $treatment->slug]);
            $response[] = array("value"=> $slug, "label"=>$treatment->title);
        }

        return response()->json($response);
    }

    public function getSearchData(Request $request)
    {
        $search = $request->search;

        if($search == ''){
            $treatments = Treatment::orderby('title','asc')->limit(3)->get();
            $doctors = Doctor::orderby('name','asc')->limit(3)->get();
            $hospitals = Hospital::orderby('name','asc')->limit(3)->get();
        }else{
            $treatments = Treatment::orderby('title','asc')->where('title', 'like', '%' .$search . '%')->limit(3)->get();
            $doctors = Doctor::orderby('name','asc')->where('name', 'like', '%' .$search . '%')->limit(3)->get();
            $hospitals = Hospital::orderby('name','asc')->where('name', 'like', '%' .$search . '%')->limit(3)->get();
        }

        $response = array();
        foreach($treatments as $treatment){
            $slug = route('treatment.showFront', ['slug' => $treatment->slug]);
            $response[] = array("url"=> $slug, "label"=>$treatment->title,  "value"=>$treatment->title, "category" => 'Treatments');
        }

        foreach($doctors as $doctor){
            $slug1 = route('doctor.show-front', ['slug' => $doctor->slug]);
            $response[] = array("url"=> $slug1, "label"=>$doctor->name, "value"=>$doctor->name, "category" => 'Doctors');
        }

        foreach($hospitals as $hospital){
            $slug2 = route('hospital.show-front', ['slug' => $hospital->slug]);
            $response[] = array("url"=> $slug2, "label"=>$hospital->name, "value"=>$hospital->name, "category" => 'Hospitals');
        }

        return response()->json($response);
    }

}
