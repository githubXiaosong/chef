<?php


function rq($key = null)
{
    return ($key == null) ? \Illuminate\Support\Facades\Request::all() : \Illuminate\Support\Facades\Request::get($key);
}

function suc($data = null)
{
    $ram = ['status' => 0];
    if ($data) {
        $ram['data'] = $data;
        return $ram;
    }
    return $ram;
}

function err($code, $data = null)
{
    if ($data)
        return ['status' => $code, 'data' => $data];
    return ['status' => $code];
}


Auth::routes();


Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'HomeController@index')->middleware('auth');
    Route::get('/home', 'HomeController@index')->middleware('auth');
    Route::get('/addCook', 'PageController@addCook')->middleware('auth');
    Route::get('/mine', 'PageController@mine')->middleware('auth');
    Route::get('/cookDetail/{cook_id}', 'PageController@cookDetail')->middleware('auth');


    Route::group(['prefix' => 'api'], function () {
        Route::post('/addCook', 'ServiceController@addCook');
        Route::post('/addComment', 'ServiceController@addComment');
        Route::post('/updateUser', 'ServiceController@updateUser');

        //APP
        /**
         * 页面改APP接口步骤  1替换URL中传递参数的方式
         *                  2把其中用到AUTH的方法换为user_id
         */
        Route::get('/login', 'ServiceController@login');
        Route::get('/cookList', 'ServiceController@cookList');
        Route::get('/mine', 'ServiceController@mine');

    });


    Route::group(['prefix' => 'admin'], function () {
        Route::get('/index', 'Admin\PageController@index');
        Route::get('/login', 'Admin\PageController@login');
        Route::get('/welcome', 'Admin\PageController@welcome');

        Route::get('/memberAdd', 'Admin\PageController@memberAdd');
        Route::get('/memberEdit/{user_id}', 'Admin\PageController@memberEdit');
        Route::get('/memberList', 'Admin\PageController@memberList');

        Route::get('/commentList', 'Admin\PageController@commentList');

        Route::get('/cookEdit/{cook_id}', 'Admin\PageController@cookEdit');
        Route::get('/cookList', 'Admin\PageController@cookList');

        Route::group(['prefix' => 'api'], function () {
            Route::post('/addUser', 'Admin\ServiceController@addUser');
            Route::post('/editUser', 'Admin\ServiceController@editUser');
            Route::post('/changeUserStatus', 'Admin\ServiceController@changeUserStatus');
            Route::post('/deleteUser', 'Admin\ServiceController@deleteUser');

            Route::post('/addCook', 'Admin\ServiceController@addCook');
            Route::post('/editCook', 'Admin\ServiceController@editCook');
            Route::post('/changeCookStatus', 'Admin\ServiceController@changeCookStatus');
            Route::post('/deleteCook', 'Admin\ServiceController@deleteCook');

            Route::post('/deleteComment', 'Admin\ServiceController@deleteComment');

        });
    });
});
