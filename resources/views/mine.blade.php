@extends('layouts.app')

@section('script_top')

@endsection

@section('content')
    <div class="container">

        @if (session('err_msg'))
            <div class="alert alert-danger">
                {{ session('err_msg') }}
            </div>
        @endif

        @if (session('suc_msg'))
            <div class="alert alert-success">
                {{ session('suc_msg') }}
            </div>
        @endif

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12 ">

                <div class="panel panel-default">

                    <div class="panel-heading">我的信息</div>

                    <div class="panel-body">

                        <div class="row col-md-5 col-md-offset-3">
                            <form action="{{ url('api/updateUser') }}" method="post" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>姓名</label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label>手机号</label>
                                    <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                                </div>



                                <button type="submit" class="btn btn-default">确定修改</button>
                            </form>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('script_bottom')

@endsection