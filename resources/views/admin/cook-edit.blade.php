<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="/admin/css/font.css">
    <link rel="stylesheet" href="/admin/css/xadmin.css">
    <link rel="stylesheet" href="/css/common.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admin/js/xadmin.js"></script>
    <script type="text/javascript" src="/js/common.js"></script>

    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="x-body">

    <script>
        @if (session('suc_msg'))
        Toast('{{ session('suc_msg') }}', 2000);
        @endif
    </script>


    <form class="layui-form" action="{{ url('admin/api/editCook') }}" method="post" enctype="multipart/form-data">

        <input type="hidden" name="cook_id" value="{{ $cook->id }}">

        {{ csrf_field() }}

        <div class="layui-form-item">
            <label for="L_title" class="layui-form-label">
                <span class="x-red">*</span>名称
            </label>

            <div class="layui-input-inline  {{ $errors->has('title') ? 'error-input' : '' }}">
                <input type="text" id="L_title" name="title" required=""
                       autocomplete="off" class="layui-input" value="{{ $cook->title }}" autofocus>
            </div>
            @if ($errors->has('title'))
                <span class="help-block error-text">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>

        <div class="layui-form-item">
            <label for="L_desc" class="layui-form-label">
                <span class="x-red">*</span>描述
            </label>

            <div class="layui-input-inline  {{ $errors->has('desc') ? 'error-input' : '' }}">
                <input type="text"  name="desc" required="" id="desc"
                       autocomplete="off" class="layui-input" value="{{ $cook->desc }}" autofocus>
            </div>
            @if ($errors->has('desc'))
                <span class="help-block error-text">
                    <strong>{{ $errors->first('desc') }}</strong>
                </span>
            @endif
        </div>

        <div class="layui-form-item">
            <label for="L_user_id" class="layui-form-label">
                <span class="x-red">*</span>所属用户
            </label>

            <div class="layui-input-inline  {{ $errors->has('user_id') ? 'error-input' : '' }}">
                <input type="text"  name="user_id" required="" id="user_id" disabled
                       autocomplete="off" class="layui-input" value="{{ $cook->user->name }}" autofocus>
            </div>
            @if ($errors->has('user_id'))
                <span class="help-block error-text">
                    <strong>{{ $errors->first('user_id') }}</strong>
                </span>
            @endif
        </div>


        <div class="layui-form-item">
            <label for="L_cover" class="layui-form-label">
                <span class="x-red">*</span>封面图片
            </label>
            @if($cook->cover_uri)
                <img style="height: 100px ;width: 100px" class="img-circle"
                     src="{{ '/storage/'.$cook->cover_uri }}">
            @endif
            <div class="layui-input-inline  {{ $errors->has('cover') ? 'error-input' : '' }}">
                <input type="file"  name="cover"  id="cover"
                       autocomplete="off" class="layui-input" value="{{ $cook->cover }}" autofocus>
            </div>
            @if ($errors->has('cover'))
                <span class="help-block error-text">
                    <strong>{{ $errors->first('cover') }}</strong>
                </span>
            @endif
        </div>

        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button class="layui-btn" lay-filter="add" lay-submit="">
                修改
            </button>
            <a style="padding-left: 20px" href="{{ url('admin/cookList') }}">返回</a>
        </div>
    </form>
</div>

</body>

</html>