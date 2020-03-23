<?php

// use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// 请求header中加Accept,值为 application/vnd.xiaoyuan.v1+json 或者是v2

$api = app('Dingo\Api\Routing\Router');

// (后台接口v1)
$api->version('v1', ['namespace' => 'App\Http\Controllers\V1', 'middleware'=> 'admin.guard'], function($api) {
    $api->post('admins/login', 'AdminController@login');
    // 需要登录才能访问的接口
    $api->group(['middleware' => 'auth.refresh'], function($api) {
        $api->post('admins/add', 'AdminController@register');
        $api->post('admins/logout', 'AdminController@logout');
    });

});

// (前端接口v1)
$api->version('v1', ['namespace' => 'App\Http\Controllers\V1', 'middleware' => 'user.guard'
], function($api) {
    $api->post('users/register', 'UserController@register');
    $api->post('users/login', 'UserController@login');
    $api->get('users', 'UserController@index');

    // 需要登录才能访问的接口
    $api->group(['middleware' => 'auth.refresh'], function($api) {
        $api->get('users/{id}', 'UserController@show');
        $api->post('users/logout', 'UserController@Logout');
        $api->patch('users/{id}', 'UserController@update');
    });
});

// (前端接口v2)
$api->version('v2', ['namespace' => 'App\Http\Controllers\V2', 'middleware' => 'user.guard'], function($api) {
    // 需要登录才能访问的接口
    $api->group(['middleware' => 'user.refresh'], function($api) {
        $api->get('users', 'UserController@index');
            
    });
});
