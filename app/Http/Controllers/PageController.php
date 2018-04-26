<?php

namespace App\Http\Controllers;

use App\Cook;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //


    public function addCook(){
        return view('addCook');
    }

    public function cookDetail($cook_id){
        $cook = Cook::with(['user'])->find($cook_id);
        return view('cookDetail')->with(['cook'=>$cook]);
    }


    public function mine()
    {
        $user = Auth::user();

        return view('mine')->with(['user' => $user]);
    }
}
