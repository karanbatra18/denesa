<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\State;
use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $state = State::where(['name' => $request->input('stateId')])->first();
        $cities = City::where('state_id', $state->id)->get();
        $data = '<select required  class="form-control" name="city"><option value="">-- Please select --</option>';
        foreach($cities as $city){
         $data .=  '<option value="'.$city->name.'">'. $city->name .'</option>';
        }
        $data .= '</select>';
        echo $data; die;
    }
}
