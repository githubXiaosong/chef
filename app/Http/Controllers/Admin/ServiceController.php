<?php

namespace App\Http\Controllers\Admin;


use App\Comment;
use App\Cook;
use App\Http\Controllers\Controller;

use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function addUser()
    {

        $validator = Validator::make(
            rq(),
            [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
                'phone' => 'required|digits:11|unique:users',
            ],
            [
                'name.required' => '姓名为必填项',
                'name.max' => '姓名的最大长度为255',
                'email.required' => '邮箱为必填项',
                'email.unique' => '该邮箱已经被注册',
                'email.email' => '邮箱必须为合法的邮箱地址',
                'email.max' => '邮箱的最大长度为255',
                'password.required' => '密码为必填项',
                'password.min' => '密码最短为6',
                'phone.required' => '手机号为必填项',
                'phone.digits' => '手机号必须为11位的数字',
                'phone.unique' => '该手机号已经存在'
            ]
        );
        if ($validator->fails())
            return back()->withErrors($validator->messages());

        $user = new User();
        $user->name = rq('name');
        $user->email = rq('email');
        $user->password = bcrypt(rq('password'));
        $user->phone = rq('phone');
        $user->save();

        return back()->with('suc_msg', '添加成功');
    }

    public function editUser()
    {

        $validator = Validator::make(
            rq(),
            [
                'user_id' => 'required|exists:users,id',
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique_other_email:' . rq('user_id'),
                'phone' => 'required|digits:11|unique_other_phone:' . rq('user_id')
            ],
            [
                'name.required' => '姓名为必填项',
                'name.max' => '姓名的最大长度为255',
                'email.required' => '邮箱为必填项',
                'email.email' => '邮箱必须为合法的邮箱地址',
                'email.unique_other_email' => '邮箱已经存在',
                'email.max' => '邮箱的最大长度为255',
                'phone.required' => '手机号为必填项',
                'phone.digits' => '手机号必须为11位的数字',
                'phone.unique_other_phone' => '手机号已经存在'
            ]
        );
        if ($validator->fails())
            return back()->withErrors($validator->messages());

        $user = User::find(rq('user_id'));
        $user->name = rq('name');
        $user->email = rq('email');
        $user->phone = rq('phone');
        $user->save();

        return back()->with('suc_msg', '修改成功');
    }

    public function changeUserStatus()
    {
        $validator = Validator::make(
            rq(),
            [
                'user_id' => 'required|exists:users,id',

            ],
            [
                'user_id.required' => '用户ID不存在',
                'user_id.exists' => '用户ID查找不到'

            ]
        );
        if ($validator->fails())
            return back()->withErrors($validator->messages());

        $user = User::find(rq('user_id'));
        $user->status = $user->status == 0 ? '1' : '0';
        $user->save();

        return back()->with('suc_msg', '修改成功');

    }

    public function deleteUser()
    {

        $validator = Validator::make(
            rq(),
            [
                'user_id' => 'required|exists:users,id'
            ],
            [
                'user_id.required' => '用户ID不存在',
                'user_id.exists' => '用户ID查找不到'
            ]
        );
        if ($validator->fails())
            return back()->withErrors($validator->messages());

        $user = User::find(rq('user_id'));
        $user->delete();

        return back()->with('suc_msg', '删除成功');

    }


    public function editCook(Request $request)
    {

        $validator = Validator::make(
            rq(),
            [
                'cook_id' => 'required|exists:cooks,id',
                'title' => 'required|max:20',
                'desc' => 'required|max:30',
                'cover' => 'image'
            ],
            [

            ]
        );
        if ($validator->fails())
            return back()->with(['err_msg' => $validator->messages()]);

        $cook = Cook::find(rq('cook_id'));
        $cook->title = rq('title');
        $cook->desc = rq('desc');
        if ($request->cover) {
            $cover_path = $request->cover->store('images', 'public');
            $cook->cover_uri = $cover_path;
        }

        $cook->save();
        return back()->with('suc_msg', '修改成功');

    }


    public function deleteCook()
    {

        $validator = Validator::make(
            rq(),
            [
                'cook_id' => 'required|exists:cooks,id'
            ],
            [

            ]
        );
        if ($validator->fails())
            return back()->with(['err_msg' => $validator->messages()]);

        $cook = Cook::find(rq('cook_id'));

        $cook->delete();

        return back()->with('suc_msg', '删除成功');
    }


    public function changeCookStatus()
    {
        $validator = Validator::make(
            rq(),
            [
                'cook_id' => 'required|exists:cooks,id',

            ],
            [
                'cook_id.required' => '用户ID不存在',
                'cook_id.exists' => '用户ID查找不到'

            ]
        );
        if ($validator->fails())
            return back()->withErrors($validator->messages());

        $cook = Cook::find(rq('cook_id'));
        $cook->status = $cook->status == 0 ? '1' : '0';
        $cook->save();

        return back()->with('suc_msg', '修改成功');

    }

    public function deleteComment()
    {

        $validator = Validator::make(
            rq(),
            [
                'comment_id' => 'required|exists:comments,id'
            ],
            [

            ]
        );
        if ($validator->fails())
            return back()->with(['err_msg' => $validator->messages()]);

        $comment = Comment::find(rq('comment_id'));

        $comment->delete();

        return back()->with('suc_msg', '删除成功');
    }

}

