<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{

     /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $banners = Banner::get();
        return view('admin.banner.edit', compact('banners'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method','document']);
       // dd($data);
        if(!empty($data)) {
            foreach($data as $key => $value) {
                $banner = Banner::where(['banner_page' => $key])->first();
                //dd($banner);
                $banner->featured_image = $value;
                $banner->save();
            }
        }
        return redirect()->back()->withSuccess('Successfully Updated');
    }
}
