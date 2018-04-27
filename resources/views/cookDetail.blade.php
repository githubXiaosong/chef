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

                    <div class="panel-heading">菜品详情</div>

                    <div class="panel-body row">

                        <div class="col-md-4 ">
                            <img style="height: 300px;width: 300px" src="{{'/storage/'.$cook->cover_uri }}">
                        </div>
                        <div class="col-md-5 ">
                            <h1>{{ $cook->title }}</h1>
                            <h4>描述:{{ $cook->desc }}</h4>
                            <h4>创建时间:{{ $cook->created_at }}</h4>
                            <h5>发布人:{{ $cook->user->name }}</h5>
                            <h5>联系方式:{{ $cook->user->phone }}</h5>
                            <br><br>
                            <button class="btn btn-default btn-lg" onclick="Toast('下单成功',2000)"> 下单</button>
                            <button class="btn btn-default btn-lg"><a href="{{ $cook->url }}">地址</a></button>

                        </div>
                    </div>


                    <div style="padding: 20px">

                        评论
                        <br><br>

                        <div>
                            <ul class="media-list">


                                @foreach($comments as $comment)
                                    <li class="media">
                                        <div class="media-body">
                                            <h4 class="media-heading">{{ $comment->user->name }}</h4>
                                            {{ $comment->content }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="input-group">
                                <form class="form form-inline" method="post" action="{{ url('api/addComment') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="cook_id" value="{{ $cook->id }}">

                                    <div class="form-group">
                                        <input type="text" name="content" style="width: 400px" class="form-control"
                                               placeholder="请输入评价" required="">
                                    </div>
                                    <button class="btn btn-default" type="submit">确认发布</button>

                                </form>
                            </div>
                            <!-- /input-group -->


                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('script_bottom')

@endsection