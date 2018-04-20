<?php

namespace App\Http\Controllers\Admin;

use App\Clouthes;
use App\Cook;
use App\Course;
use App\Http\Controllers\Controller;
use App\Product;
use App\Room;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;


class PageController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function welcome()
    {
        return view('admin.welcome');
    }

    public function memberList()
    {
        $users = User::get();
        return view('admin.member-list')->with(['users' => $users]);
    }

    public function memberAdd()
    {
        return view('admin.member-add');
    }

    public function memberEdit($id)
    {
        $user = User::find($id);
        return view('admin.member-edit')->with(['user' => $user]);
    }

    public function cookList()
    {
        $cooks = Cook::with('user')->get();
        return view('admin.cook-list')->with(['cooks' => $cooks]);
    }

    public function cookEdit($id)
    {
        $cook = Cook::find($id);
        return view('admin.cook-edit')->with(['cook' => $cook]);
    }



}
