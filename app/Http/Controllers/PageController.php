<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //

    public function addCook(){
        return view('addCook');
    }

    public function mine()
    {
        $user = Auth::user();

        return view('mine')->with(['user' => $user]);
    }
}
