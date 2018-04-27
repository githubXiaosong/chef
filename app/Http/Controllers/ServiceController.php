<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Cook;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function addCook(Request $request)
    {

        $validator = Validator::make(
            rq(),
            [
                'title' => 'required|max:20',
                'desc' => 'required|max:255',
                'cover' => 'required|image',
                'url' => 'required|active_url'

            ],
            [
            ]
        );
        if ($validator->fails())
            return back()->with(['err_msg' => $validator->messages()]);


        $user = Auth::user();
        $cover_path = $request->cover->store('images', 'public');

        $clouthes = new Cook();
        $clouthes->title = rq('title');
        $clouthes->url = rq('url');
        $clouthes->desc = rq('desc');
        $clouthes->cover_uri = $cover_path;
        $clouthes->user_id = $user->id;

        $clouthes->save();

        return back()->with('suc_msg', 'upload success');

    }

    public function addComment(Request $request)
    {

        $validator = Validator::make(
            rq(),
            [
                'content' => 'required|max:20',
                'cook_id' => 'required|exists:cooks,id',
            ],
            [
            ]
        );
        if ($validator->fails())
            return back()->with(['err_msg' => $validator->messages()]);


        $user = Auth::user();
        $comment = new Comment();
        $comment->content = rq('content');
        $comment->cook_id = rq('cook_id');
        $comment->user_id = $user->id;

        $comment->save();

        return back()->with('suc_msg', '添加成功');

    }


    public function updateUser()
    {


        $validator = Validator::make(
            rq(),
            [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|min:11|max:11'
            ],
            [

            ]
        );
        if ($validator->fails())
            return back()->with(['err_msg' => $validator->messages()]);


        $user = Auth::user();
        $user->name = rq('name');
        $user->email = rq('email');
        $user->phone = rq('phone');

        $user->save();
        return back()->with('suc_msg', '修改成功');
    }

    //APP

    /**
     * @return array
     * email
     * password
     */
    public function login()
    {

        $validator = Validator::make(
            rq(),
            [
                'email' => 'required|exists:users,email',
                'password' => 'required',
            ],
            [
            ]
        );
        if ($validator->fails())
            return $validator->messages();

        $email = rq('email');
        $password = rq('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return suc(User::where(['email' => $email])->first());
        }

        return err(-1);
    }

    public function cookList()
    {

        return suc(Cook::where(['status' => STATUS_NORMAL])->with(['user'])->get());

    }


    /**
     * @return array user_id
     */
    public function mine()
    {

        $validator = Validator::make(
            rq(),
            [
                'user_id' => 'required|exists:users,id',
            ],
            [
            ]
        );
        if ($validator->fails())
            return $validator->messages();

        $user = User::find(rq('user_id'));

        return $user;
    }


}
