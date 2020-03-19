<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;

class AdminController extends Controller
{
    public function __construct() {
    }
    /**
     * @group admins
     * admin user regist
     */
    public function register(Request $request) {
        $name = $request->name;
        $password = $request->password;
        $check_password = $request->check_password;
        // dd($password, $check_password);
        if (!$password || !$name) {
            return response()->json(['success' => false, 'message' => '用户名或密码必填！']);
        }

        if ($password != $check_password) {
            return response()->json(['success' => false, 'message' => '两次密码输入不一致！']);
        }
        $admin = Admin::where('name', $name)->first();
        if ($admin) {
            return response()->json(['success' => false, 'message' => '用户已被注册！']);
        }

        $password = Hash::make($password);
        $admin = Admin::create([
            'name' => $name,
            'password' => $password
        ]);

        return response()->json(['success' => true, 'message' => '注册成功！', 'admin' => $admin]);
    }

    /**
     * @group admins
     * admin user login
     * @param Request $request
     */
    public function login(Request $request)
    {
        $name = $request->name;
        $password = $request->password;


        $admin = Admin::where('name', $name)->first();
        if (!$admin || !Hash::check($password, $admin->password)) {
            return response()->json(['success' => false, 'message' => '用户名或密码错误']);
        }

        $credentials = request(['name', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * @group admins
     * admin user logout
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => '退出成功']);
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth()->factory()->getTTL()
        ]);
    }

}
