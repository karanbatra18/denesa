<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DenesaObjective;
use App\IsoOrganization;
use App\ServiceItem;
use Illuminate\Http\Request;
use App\AboutIntroduction;
use App\UniqueService;
use App\Vision;
use Illuminate\Support\Facades\Redirect;

class AboutController extends Controller
{
    public function edit()
    {
        $aboutIntroduction = AboutIntroduction::first();
        $uniqueService = UniqueService::first();
        $isoOrganization = IsoOrganization::first();
        $denesaObjective = DenesaObjective::first();
        $visions = Vision::get();
        $serviceItems = ServiceItem::get();
        return view('admin.about.edit', compact('aboutIntroduction','visions', 'uniqueService', 'serviceItems', 'isoOrganization','denesaObjective'));
    }

    public function update(Request $request)
    {
        if (!empty($request->uniqueService)) {
            foreach ($request->uniqueService as $key => $value) {
                $uniqueService = UniqueService::findOrFail($key);
                $uniqueService->title = $value['title'] ?? null;
                $uniqueService->description = $value['description'] ?? null;
                $uniqueService->save();
            }
        }

        if (!empty($request->aboutIntroduction)) {
            foreach ($request->aboutIntroduction as $key => $value) {
                $introduction = AboutIntroduction::findOrFail($key);
                $introduction->description = $value['description'] ?? null;
                $introduction->save();
            }
        }

        if (!empty($request->vision)) {
            foreach ($request->vision as $key => $value) {
                $vision = Vision::findOrFail($key);
                $vision->featured_image = $value['featured_image'] ?? null;
                $vision->title = $value['title'] ?? null;
                $vision->description = $value['description'] ?? null;
                $vision->save();
            }
        }

        if (!empty($request->overallFigure)) {
            foreach ($request->overallFigure as $key => $value) {
                $serviceItem = ServiceItem::findOrFail($key);
                $serviceItem->featured_image = $value['featured_image'] ?? null;
                $serviceItem->title = $value['title'] ?? null;
                $serviceItem->total_count = $value['total_count'] ?? null;
                $serviceItem->save();
            }
        }

        if (!empty($request->isoOrganization)) {
            foreach ($request->isoOrganization as $key => $value) {
                $isoOrganization = IsoOrganization::findOrFail($key);
                $isoOrganization->title = $value['title'] ?? null;
                $isoOrganization->description = $value['description'] ?? null;
                $isoOrganization->featured_image = $value['featured_image'] ?? null;
                $isoOrganization->save();
            }
        }

        if (!empty($request->denesaObjective)) {
            foreach ($request->denesaObjective as $key => $value) {
                $denesaObjective = DenesaObjective::findOrFail($key);
                $denesaObjective->title = $value['title'] ?? null;
                $denesaObjective->description = $value['description'] ?? null;
                $denesaObjective->save();
            }
        }

        if (!empty($request->overallFigureNew)) {
            foreach ($request->overallFigureNew as $key => $value) {
                $data = [
                    'featured_image' => $value['featured_image'] ?? null,
                    'title' => $value['title'] ?? null,
                    'total_count' => $value['total_count'] ?? null
                ];

                ServiceItem::create($data);
            }
        }

        return Redirect::back()->withSuccess(['msg', 'Successfully Updated']);
    }
}
