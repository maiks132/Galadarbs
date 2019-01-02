<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\mailSending;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class EmailController extends Controller
{
	public function contact(){
		return view('mail.contact');
	}

    public function send(Request $request){

    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required|email',
    		'message' => 'required'
    	]);
    	$data = array(
    		'name' => $request->name,
        'email' => $request->email,
        'theme' => $request->theme,
    		'message' => $request->message
    	);


    	//   $name = 'test';
    	//   $name1 = "name2";
    	//   $name2 = "name 3";
   		Mail::to('5a0cd03fd6-230d1a@inbox.mailtrap.io')->send(new mailSending($data));
   		return back()->with('success', 'Paldies, ka sazinājāties ar mums!');
   
   		// return $this->redirect('dashboard.index')->with('success', 'Message Sent');
   		// 	//return "ok";
	}
}
