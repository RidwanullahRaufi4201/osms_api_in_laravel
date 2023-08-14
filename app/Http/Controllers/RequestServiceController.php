<?php

namespace App\Http\Controllers;

use App\Models\RequestService;
use App\Models\User;
use Illuminate\Http\Request;

class RequestServiceController extends Controller
{
    
    public function requestService(Request $request)
    {
                    // $request->validate([
                    //     'requestInfo'=>'required',
                    //     'description'=>'required',
                    //     'name'=>'required',
                    //     'addressOne'=>'required',
                    // ]);
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
                    'user_id'=>"required"
                  ]);


                  RequestService::insert([
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
                    'user_id'=>$request->user_id
                  ]);

            return response([
                'status'=>"ok"
            ]);
    }


    public function getTotalRequest($user_id)
    {
        $userRequested=requestService::where('user_id',$user_id)->get();
        $totalRequest=count($userRequested);
        return response([
            'status'=>'ok',
            'data'=>$totalRequest
        ]);

    }
    public function getTotalRequests($user_id)
    {
        $userRequested=requestService::where('user_id',$user_id)->get();
        
        return response([
            'status'=>'ok',
            'requests'=>$userRequested
        ]);

    }

    public function getTotalPendingRequest($user_id)
    {
      $userRequested=requestService::where('user_id',$user_id)->where("request_status","=","pending")->get();
       $totalPendingRequests=count($userRequested);
       return response([
        'status'=>'ok',
        'data'=>$totalPendingRequests
     ]);

    }


    public function getTotalAcceptedRequest($user_id)
    {
      $userRequested=requestService::where('user_id',$user_id)->where("request_status","=","accepted")->orWhere('request_status', '=',"Assigned")->get();
      $totalAcceptedRequests=count($userRequested);
       return response([
        'status'=>'ok',
        'data'=>$totalAcceptedRequests
     ]);

    }


    public function checkReqeustStatus($requestId)
    {
      $request= requestService::find($requestId);
   
      return response([
        'status'=>'ok',
        'request'=>$request
      ]);
      
          
    }

    public function getAllRequests()
    {
      $request= requestService::where("request_status","=","pending")->get();
   
      return response([
        'status'=>'ok',
        'request'=>$request
      ]);
      
          
    }
    public function getAllRequestsCount()
    {
      $request= requestService::get();
   
      return response([
        'status'=>'ok',
        'request'=>count( $request)
      ]);
      
          
    }


    public function changeStatus($id)
    {
            $request=requestService::find($id);
            $request->request_status="Assigned";
            $request->save();
            return response(['status'=>"ok"]);
    }



    public function getAllUsers()
    {
      $userRequested=User::where('privilege',2)->get();
     
       return response([
        'status'=>'ok',
        'data'=>$userRequested
     ]);

    }



}
