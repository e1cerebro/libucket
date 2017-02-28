<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;


class Email extends Controller
{
    //
    
    public function sendemail($name, $email, $messages){
    
            
                Mail::send('emails.welcome', ['name' => $name,'email' => $email,'messages' => $messages], function ($message) {
            
                    $message->from('nwachukwu16@gmail.com', 'Learning Laravel');
            
                    $message->to('nwachukwu.uchenna.christian@gmail.com')->subject('Learning Laravel test email');
            
                });
            
                return true;
            
            
    }
}
