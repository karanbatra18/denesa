<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function edit()
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
        return view('admin.home.edit', compact('treatments', 'hospitals', 'doctors', 'departmentCosts', 'estimationCost','overallFigures','aboutMedical','introduction', 'countryFlags', 'denesaServices'));
    }

    public function update(Request $request)
    {
        if (!empty($request->treatment)) {
            foreach ($request->treatment as $key => $value) {
                $treatment = FeaturedTreatment::findOrFail($key);
                $treatment->featured_image = $value['featured_image'] ?? null;
                $treatment->title = $value['title'] ?? null;
                $treatment->link = $value['link'] ?? null;
                $treatment->description = $value['description'] ?? null;
                $treatment->icon_image = $value['icon_image'] ?? null;
                $treatment->save();
            }
        }

        if (!empty($request->hospital)) {
            foreach ($request->hospital as $key => $value) {
                $hospital = FeaturedHospital::findOrFail($key);
                $hospital->featured_image = $value['featured_image'] ?? null;
                $hospital->link = $value['link'] ?? null;
                $hospital->save();
            }
        }

        if (!empty($request->doctor)) {
            foreach ($request->doctor as $key => $value) {
                $doctor = TopDoctor::findOrFail($key);
                $doctor->featured_image = $value['featured_image'] ?? null;
                $doctor->name = $value['name'] ?? null;
                $doctor->link = $value['link'] ?? null;
                $doctor->designation = $value['designation'] ?? null;
                $doctor->save();
            }
        }

        if (!empty($request->departmentCost)) {
            foreach ($request->departmentCost as $key => $value) {
                $departmentCost = DepartmentCost::findOrFail($key);
                $departmentCost->name = $value['name'] ?? null;
                $departmentCost->cost_description = $value['cost_description'] ?? null;
                $departmentCost->save();
            }
        }

        if (!empty($request->estimationCost)) {
            foreach ($request->estimationCost as $key => $value) {
                $estimationCost = EstimationCost::findOrFail($key);
                $estimationCost->featured_image = $value['featured_image'] ?? null;
                $estimationCost->title = $value['title'] ?? null;
                $estimationCost->description = $value['description'] ?? null;
                $estimationCost->save();
            }
        }

        if (!empty($request->overallFigure)) {
            foreach ($request->overallFigure as $key => $value) {
                $overallFigure = OverallFigure::findOrFail($key);
                $overallFigure->featured_image = $value['featured_image'] ?? null;
                $overallFigure->title = $value['title'] ?? null;
                $overallFigure->total_count = $value['total_count'] ?? null;
                $overallFigure->save();
            }
        }

        if (!empty($request->aboutMedical)) {
            foreach ($request->aboutMedical as $key => $value) {
                $aboutMedical = AboutMedical::findOrFail($key);
                $aboutMedical->title = $value['title'] ?? null;
                $aboutMedical->description = $value['description'] ?? null;
                $aboutMedical->save();
            }
        }

        if (!empty($request->introduction)) {
            foreach ($request->introduction as $key => $value) {
                $introduction = Introduction::findOrFail($key);
                $introduction->description = $value['description'] ?? null;
                $introduction->save();
            }
        }

        if (!empty($request->countryFlag)) {
            foreach ($request->countryFlag as $key => $value) {
                $countryFlag = CountryFlag::findOrFail($key);
                $countryFlag->name = $value['name'] ?? null;
                $countryFlag->featured_image = $value['featured_image'] ?? null;
                $countryFlag->save();
            }
        }

        if (!empty($request->denesaService)) {
            foreach ($request->denesaService as $key => $value) {
                $denesaService = DenesaService::findOrFail($key);
                $denesaService->title = $value['title'] ?? null;
                $denesaService->description = $value['description'] ?? null;
                $denesaService->featured_image = $value['featured_image'] ?? null;
                $denesaService->save();
            }
        }

        return Redirect::back()->withSuccess(['msg', 'Successfully Updated']);
    }
}
