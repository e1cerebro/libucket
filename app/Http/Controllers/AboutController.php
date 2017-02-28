<?php
/** @author: Nwachukwu Uchenna
*   @date:   24-02-2017
*   @desc: TThis is the about me page.
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AboutController extends Controller
{
    
    //Display the about view
    public function index(){
        
        return view('about');
    }
}
