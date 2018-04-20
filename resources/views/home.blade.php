@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="page-header">
                <h3 style="padding-left: 20px">菜品列表
                    <small> 共{{ count($cooks) }}条</small>

                </h3>
            </div>

            <div class="panel-body">
                @foreach($cooks as $cook)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">

                            <img style="" src="{{ '/storage/'.$cook->cover_uri }}" alt="...">

                            <div class="caption">
                                <div>
                                    <h3 class="pull-left">{{ $cook->title }}</h3>

                                    <h3 class="pull-right" style="font-size: 15px">{{ $cook->user->name }}</h3>

                                    <div style="clear: both;"></div>
                                    <h5 style="font-size: 15px">{{ $cook->desc }}</h5>
                                    <h5 style="font-size: 15px">联系方式：{{ $cook->user->phone }}</h5>
                                </div>
                            </div>

                        </div>

                    </div>
                @endforeach


        </div>
    </div>
@endsection
