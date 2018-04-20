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

    <div class="row">
        <div class="col-md-12 ">

            <div class="panel panel-default">
                <div class="panel-heading">添加菜品</div>

                <div class="panel-body">

                    <div class="row">
                        <form class="form-horizontal" action="{{ url('api/addCook') }}" method="post"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">名称</label>

                                <div class="col-sm-6">
                                    <input name="title" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">描述</label>

                                <div class="col-sm-6">
                                    <input name="desc" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">封面图片</label>

                                <div class="col-sm-6">
                                    <input name="cover" type="file" class="form-control"
                                           placeholder="请上传？？X ？？大小的图片">
                                </div>
                            </div>





                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">确定上传</button>
                                </div>
                            </div>
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