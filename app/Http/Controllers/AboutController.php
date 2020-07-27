<?php

namespace App\Http\Controllers;

use App\DenesaService;
use Illuminate\Http\Request;
use App\DenesaObjective;
use App\IsoOrganization;
use App\ServiceItem;
use App\AboutIntroduction;
use App\UniqueService;
use App\Vision;

class AboutController extends Controller
{
    public function index()
    {
        $aboutIntroduction = AboutIntroduction::first();
        $uniqueService = UniqueService::first();
        $isoOrganization = IsoOrganization::first();
        $denesaObjective = DenesaObjective::first();
        $visions = Vision::get();
        $serviceItems = ServiceItem::get();
        $denesaServices = DenesaService::get();
       // dd($denesaServices);
        return view('about.index', compact('aboutIntroduction','visions', 'uniqueService', 'serviceItems', 'isoOrganization','denesaObjective', 'denesaServices'));
    }
}
