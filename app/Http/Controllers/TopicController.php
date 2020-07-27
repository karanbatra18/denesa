<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($type)
    {
        $type = !empty($type) ? $type : 'testimonial';
        $topics = Topic::where(['type' => $type])->get();
        return view('admin.topic.index', compact('topics','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        return view('admin.topic.create',compact('type'));
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
        Topic::create($requestedData);
        return redirect()->route('topic.index.type',['type' => $type]);
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
        $topic = Topic::whereId($id)->first();
        return view('admin.topic.create', compact('topic'));
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
            'name' => 'required|min:3|max:255',
        ]);
        $data = $request->except(['_token', '_method']);
        Topic::whereId($id)->update($data);
        $type = $request->type;
        return redirect()->route('topic.index.type',['type' => $type]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = Topic::whereId($id)->firstOrFail();
        $type = $topic->type;
        $topic->delete();

        return redirect()->route('topic.index.type',['type' => $type]);
    }
}
