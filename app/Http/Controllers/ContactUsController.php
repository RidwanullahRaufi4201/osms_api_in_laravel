<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    
    public function contactUs(Request  $request)
    {
           $request->validate([
            "name"=>"required",
            "email"=>"required",
            "number"=>"required",
            "message"=>"required"
           ]);

           ContactUs::insert([
            "name"=>$request->name,
            "email"=>$request->email,
            "number"=>$request->number,
            "message"=>$request->message
           ]);

           return response([
            'status'=>"ok"
           ]);
    }


    public function getAllContacts()
    {
          return response([
            "status"=>"ok",
            "contacts"=>ContactUs::get()
          ]);
    }
}
