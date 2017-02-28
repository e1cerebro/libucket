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


class LocationControlller extends Controller
{
    /**
    * This is the index function, It communications with route('/') in the routes file
    * The index function basically displays the welcome page
    * It passes on all the Library locations as an array to the page
    */
    public function index(){
        
        
        //Get all the Library Locations
        $locations = Location::all();
        
        //return the welcome page with locations as a parameter
        return view('welcome', array("locations"=>$locations));
    }
    
   /**
    * @params: It needs to recieve a post Request from the welcome page
    * @desc:
    * This function is called when a user makes a search for a single library.
    * For now this search is done from the welcome page
    * It retieves the library location and converts it to an array before passing it on to the singleLocation view
    */
    public function locationsearch(Request $request){
        
           //Get a single location where the name matches the name specified by the search query.
           $location = Location::where('library', $request->name)
                                 ->get();
                                 
           //Convert the location to an array before submitting it to the view.
           $locationArray = $location->toArray();
                                 
         //Checking if the search returned only one library
          if(count($location) != 1){
              //if the block is true, construct a session message for the user
              $request->session()->flash("searcherror", "<strong> <i class=\"fa fa-frown-o\"></i> Oh snap!</strong> Sorry, we could not find any result for $request->name, try submitting again.");
              //redirect back to the page where the request came from.
              return redirect()->back();
          }else{
             //else return the user to the correct view and pass the arguement array 
             return view('singleLocation', array("library"=>$locationArray));
          }
                 
    }
    
    /**
     * Returns all the library locations within the city 
     */
    public function all(){
        
        $locations = Location::orderBy('library', 'asc')
                               ->get();
        return view('alllocations', array("locations"=>$locations));
    }
    
    
    
}
