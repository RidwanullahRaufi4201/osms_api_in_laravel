<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class profileController extends Controller
{


    public function changeUserName(Request $request)
    {
                         $request->validate([
                            'name'=>'required'
                         ]);
                      $user=User::find($request->id);
                      $user->name=$request->name;
                      $user->save();
                      return response(['name'=>$user->name]);


    }
}
