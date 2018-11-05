<?php

namespace App\Http\Controllers\Client;

use App\Contactusform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class ContactusformController extends Controller
{


    public function contactUS()
    {
        return view('client.contactUS');
    }

    public function contactUSPost(Request $request)
    {
        $this->validate($request, [
         'name' => 'required',
         'email' => 'required|email',
         'message' => 'required'
         ]);
  
         Contactusform::create($request->all());
  

        Mail::send('email',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        ), function($message)
    {
        $message->from('test.ialexies@gmail.com');
        $message->to('ialexies@gmail.com', 'Admin')->subject('MFI.com Contact Form Inquiry');
    });


        return back()->with('success', 'Thanks for contacting us!');
    }



}
