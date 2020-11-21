<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Category;

class TestimonialController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $query = Testimonial::whereStatus('publish')->where(function($q) {
            $q->where('published_at', '<=' , Carbon::now())
                ->orWhereNull('published_at');
        });

        $testimonials = $query->paginate(10);

        $totalCount = $query->count();

        $categories = Category::where(['type' => 'testimonial'])->get();

        return view('testimonial.index', compact('testimonials', 'categories', 'totalCount'));

    }

    public function indexCategory($slug)
    {
        $category = Category::where(['slug' => $slug])->first();
        $query = $category->testimonials()->whereStatus('publish')->where(function($q) {
            $q->where('published_at', '<=' , Carbon::now())
                ->orWhereNull('published_at');
        });

        $testimonials = $query->paginate(10);

        $totalCount = Testimonial::whereStatus('publish')->where(function($q) {
            $q->where('published_at', '<=' , Carbon::now())
                ->orWhereNull('published_at');
        })->count();

        //$totalCount = $query->count();

        $categories = Category::where(['type' => 'testimonial'])->get();

        return view('testimonial.index', compact('testimonials', 'categories', 'topics', 'totalCount'));

    }


    public function show($slug)
    {
        $testimonial = Testimonial::with('images')->whereSlug($slug)->firstOrFail();
        $relatedTestimonials = Testimonial::with('images')->where('id','!=',$testimonial->id)->latest()->limit(3)->get();
        return view('testimonial.show', compact('testimonial','relatedTestimonials'));
    }

    
}
