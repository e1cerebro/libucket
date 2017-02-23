<?php

/** @author: Nwachukwu Uchenna
*   @date:   24-02-2017
*   @desc: This class handles the basic functions that are related to the library locations
*          It is accessed from the routes.
*/

namespace App\Http\Controllers;

//Basic importations of the necessary classes that we will use inside this controller class
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Location;


class ContactController extends Controller
{
    
    public function contact(){
        
        return view('contact');
    }
    
    
}
