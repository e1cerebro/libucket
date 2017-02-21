<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Location;

class LocationControlller extends Controller
{
    
    public function index(){
        
        $locations = Location::all();
        return view('welcome', array("locations"=>$locations));
    }
    
    public function locationsearch(Request $request){
       $location = Location::where('library', $request->name)
                             ->get()->toArray();
                 
       return view('singleLocation', array("library"=>$location));
    }
    
    
    
}
