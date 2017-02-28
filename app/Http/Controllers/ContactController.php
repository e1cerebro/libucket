<?php

/** @author: Nwachukwu Uchenna
*   @date:   24-02-2017
*   @desc: This class handles tasks related to contact us activities. Like sending emails and validating the contact us form.
*/

namespace App\Http\Controllers;

//Basic importations of the necessary classes that we will use inside this controller class
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Location;
use  App\Http\Controllers\Email;


class ContactController extends Controller
{
    private $errormessage = "";
    private $successmessage = "";
    private $emailobject="";

     public function __construct()
    {
        //Calling a method that is from the OtherController
        $this->emailobject = new Email();
    }
    
   /*
        This function returns the contact view. 
    */
    public function contact(){
        
             return view('contact');
    }

    
    public function verify(Request $request){
          
       //validate the user data before sending the email
       $this->validate($request, [
            'name'  => 'required|min:2',
            'email' => 'required|email',
            'message' => 'required|min:5',
           'g-recaptcha-response' =>'required|min:10'
        ]);
        
        if( $this->emailobject->sendemail($request->name, $request->email, $request->message) == true){
                $this->successmessage = 'Thanks for contacting us!';
                return view('contact', array('errormessage'=>$this->errormessage,'successmessage'=>$this->successmessage));
        }else{
                $this->errormessage = 'We could not complete your request at this time, try again later.';
                return view('contact', array('errormessage'=>$this->errormessage, 'successmessage'=>$this->successmessage));
        }
        
          

    }
    
    
    
}
