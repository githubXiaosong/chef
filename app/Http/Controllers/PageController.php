<?php

namespace App\Http\Controllers;

use App\Comment;
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
        $comments = Comment::where(['cook_id'=>$cook_id])->with(['user'])->get();
        return view('cookDetail')->with(['cook'=>$cook,'comments'=>$comments]);
    }


    public function mine()
    {
        $user = Auth::user();

        return view('mine')->with(['user' => $user]);
    }
}
