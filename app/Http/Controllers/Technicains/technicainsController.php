<?php

namespace App\Http\Controllers\Technicains;

use App\Http\Controllers\Controller;
use App\Models\Technicain;
use Illuminate\Http\Request;

class technicainsController extends Controller
{
    public function getAllTechnicains()
    {
           return response(
            [
                'status'=>"ok",
                'technicains'=>Technicain::get()
           ]);
    }
    public function getAllTechnicainsCount()
    {
           return response(
            [
                'status'=>"ok",
                'technicains'=>count( Technicain::get())
           ]);
    }
}
