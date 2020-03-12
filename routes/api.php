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

$api->version('v1', ['namespace' => 'App\Http\Controllers\V1'], function($api) {
    $api->post('users/register', 'UserController@register');
    $api->post('users/login', 'UserController@login');
    $api->post('admins/login', 'AdminController@login');
});

// 需要登录才能访问的接口(后台接口v1)
$api->version('v1', ['namespace' => 'App\Http\Controllers\V1', 'middleware'=> 'auth:admins'], function($api) {
    $api->post('admins/add', 'AdminController@register');
    $api->post('admins/logout', 'AdminController@logout');
});

// 需要登录才能访问的接口(前端接口v1)
$api->version('v1', ['namespace' => 'App\Http\Controllers\V1', 'middleware' => 'auth:users'], function($api) {
    $api->get('users', 'UserController@index');
    $api->get('users/{id}', 'UserController@show');
    $api->patch('users/{id}', 'UserController@update');
});

// 需要登录才能访问的接口(前端接口v2)
$api->version('v2', ['namespace' => 'App\Http\Controllers\V2', 'middleware' => 'auth:users'], function($api) {
    $api->get('users', 'UserController@index');
});
