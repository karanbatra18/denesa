<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Speciality;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        $type = !empty($type) ? $type : 'doctor';
        $categories = Speciality::where(['type' => $type])->get();
        return view('admin.speciality.index', compact('categories','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        return view('admin.speciality.create',compact('type'));
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
        ]);

        $requestedData = $request->all();
        $type = $request->type;
        Speciality::create($requestedData);
        return redirect()->route('speciality.index.type',['type' => $type]);
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Speciality::whereId($id)->first();
        return view('admin.speciality.create', compact('category'));
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
            'name' => 'required|min:3|max:255'
        ]);

        $data = $request->except(['_token', '_method']);
        Speciality::whereId($id)->update($data);
        $type = $request->type;
        return redirect()->route('speciality.index.type',['type' => $type]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Speciality::whereId($id)->firstOrFail();
        $type = $category->type;
        $category->delete();
        return redirect()->route('speciality.index.type',['type' => $type]);
    }
}
