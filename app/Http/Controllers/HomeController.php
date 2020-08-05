<?php

namespace App\Http\Controllers;

use App\KnowledgeCenter;
use App\Testimonial;
use Illuminate\Http\Request;
use App\FeaturedTreatment;
use App\FeaturedHospital;
use App\TopDoctor;
use App\DepartmentCost;
use App\EstimationCost;
use App\OverallFigure;
use App\AboutMedical;
use App\Introduction;
use App\CountryFlag;
use App\DenesaService;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $overallFigures = OverallFigure::get();
        $treatments = FeaturedTreatment::get();
        $hospitals = FeaturedHospital::get();
        $doctors = TopDoctor::get();
        $countryFlags = CountryFlag::get();
        $denesaServices = DenesaService::get();
        $departmentCosts = DepartmentCost::get();
        $estimationCost = EstimationCost::first();
        $aboutMedical = AboutMedical::first();
        $introduction = Introduction::first();
        $featuredNews = KnowledgeCenter::where(['is_featured' => 1])->first();
        $videoTestimonial = Testimonial::where(['is_featured' => 1])->where('video_url','!=',null)->first();
        $featuredTestimonials = Testimonial::where(['is_featured' => 1])->where('id','!=', $videoTestimonial->id)->limit(5)->get();

        return view('home.index',compact('treatments', 'hospitals', 'doctors', 'departmentCosts', 'estimationCost','overallFigures','aboutMedical','introduction', 'countryFlags', 'denesaServices', 'featuredNews', 'videoTestimonial', 'featuredTestimonials'));
    }
}
