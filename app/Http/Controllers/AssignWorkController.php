<?php

namespace App\Http\Controllers;

use App\Models\AssignWork;
use Illuminate\Http\Request;

class AssignWorkController extends Controller
{
    
    public function assignWork(Request $request)
    {

       // return response($request->technicainid);
        $request->validate([
            'requestInfo'=>'required',
            'description'=>'required',
            'name'=>'required',
            'addressOne'=>'required',
            'addressTwo'=>'required',
            'city'=>'required',
            'state'=>'required',
            'zip'=>'required',
            'mobile'=>"required",
            'email'=>'required',
            'date'=>'required',
          ]);
          AssignWork::insert([
            'requestInfo'=>$request->requestInfo,
            'description'=>$request->description,
            'name'=>$request->name,
            'addressOne'=>$request->addressOne,
            'addressTwo'=>$request->addressTwo,
            'city'=>$request->city,
            'state'=>$request->state,
            'zip'=>$request->zip,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
            'date'=>$request->date,
            'technicain_id'=>$request->technicainid,
            
          ]);

          return response(['status'=>'ok']);
    }


    public function getWorderOrder()
    {
           
      return response([
        'status'=>'ok',
         'workorder'=>AssignWork::get(),
      ]);
    }
    
    public function getAssignedWork()
    {
           
      return response([
        'status'=>'ok',
         'assignedWork'=>count( AssignWork::get())
      ]);
    }
}
