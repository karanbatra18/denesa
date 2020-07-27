<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\StoreTestimonial;
use App\Http\Requests\UpdateTestimonial;
use App\TestimonialImage;
use App\Topic;
use Illuminate\Http\Request;

use App\Testimonial;

use File;

class TestimonialController extends Controller
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

        $testimonials = Testimonial::with('images')->get();
        $testimonialImages = TestimonialImage::get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Display a listing of the Trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $testimonials = Testimonial::onlyTrashed()->get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function backToList(Request $request)
    {
        $id = $request->input('id');
        Testimonial::whereId($id)->restore();
        return redirect()->route('testimonial.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where(['type' => 'testimonial'])->get();
       /* $topics = Topic::where(['type' => 'testimonial'])->get();*/
        return view('admin.testimonial.create', compact('categories'));
    }

    /**
     * @param StoreTestimonial $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTestimonial $request)
    {
        $validateData = $request->validate([
            'title' => 'required|min:3|max:255',
            'place' => 'required|min:2|max:50',
            'description' => 'required|min:3',
            'image' => 'required',
        ]);

        $testimonialImgNew = $request->testimonialImageNew;
        //dd($testimonialImgNew);

        $data = $request->all();
        $data['user_id'] = auth()->id();
        if(isset($data['category_id']))
        {
            $category_id = $data['category_id'];
            unset($data['category_id']);
        }

        /*if(isset($data['topic_id']))
        {
            $topic_id = $data['topic_id'];
            unset($data['topic_id']);
        }*/

        $testimonial = Testimonial::create($data);
        if(!empty($category_id)) {
            $testimonial->categories()->attach($category_id);
        }

       /* if(!empty($topic_id)) {
            $testimonial->topics()->attach($topic_id);
        }*/

        if (!empty($testimonialImgNew)) {
            foreach ($testimonialImgNew as $key => $value) {
                $data = [
                    'featured_image' => $value['featured_image'] ?? null
                ];

                $testimonial->images()->create($data);
            }
        }

        return redirect()->route('testimonial.index');
    }

    /**
     * @param Testimonial $testimonial
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonial.show', compact('testimonial'));
    }

    /**
     * @param Testimonial $testimonial
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Testimonial $testimonial)
    {
        $categories = Category::where(['type' => 'testimonial'])->get();
        $categoryTestimonials = $testimonial->categories()->pluck('categories.id')->toArray();

/*        $topics = Topic::where(['type' => 'testimonial'])->get();
        $topicTestimonials = $testimonial->topics()->pluck('topics.id')->toArray();*/
        $testimonialImages = $testimonial->images()->get();
        return view('admin.testimonial.create', compact('testimonial','categories','categoryTestimonials','testimonialImages'));
    }

    /**
     * @param UpdateTestimonial $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTestimonial $request, $id)
    {
        $validateData = $request->validate([
            'title' => 'required|min:3|max:255',
            'place' => 'required|min:2|max:50',
            'description' => 'required|min:3',
            //'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $testimonialImg = $request->testimonialImage;

        $data = $request->except(['_token', '_method','testimonialImage']);
        $category_id = [];
        $topic_id = [];
        $data['user_id'] = auth()->id();
        if(isset($data['category_id']))
        {
            $category_id = $data['category_id'];
            unset($data['category_id']);
        }

       /* if(isset($data['topic_id']))
        {
            $topic_id = $data['topic_id'];
            unset($data['topic_id']);
        }*/

        Testimonial::whereId($id)->update($data);
        $testimonial = Testimonial::find($id);
        $testimonial->categories()->sync($category_id);
        /*$testimonial->topics()->sync($topic_id);*/

        if (!empty($testimonialImg)) {
            $testimonial->images()->delete();
            foreach ($testimonialImg as $key => $value) {
                $data = [
                    'featured_image' => $value['featured_image'] ?? null
                ];

                $testimonial->images()->create($data);
            }
        }

        return redirect()->route('testimonial.index');
    }

    /**
     * @param Testimonial $testimonial
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('testimonial.index');
    }
}
