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

    /***
     * 后台管理员登录
     * @param Request $request
     */
    public function login(Request $request)
    {
        $name = $request->name;
        $password = $request->password;

        if (!$name || !$password) {
            return response()->json(['success' => false, 'message' => '用户名或密码填写错误！']);
        }

        $admin = Admin::where('name', $name)->first();
        if (!$admin) {
            return response()->json(['success' => false, 'message' => '用户不存在！']);
        }

        if (!Hash::check($password, $admin->password)) {
            return response()->json(['success' => false, 'message' => '密码填写错误！']);
        }

        $credentials = request(['name', 'password']);
        if (!$token = auth('admins')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Log the admin out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('admins')->refresh());
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
            'expires_in' => auth('admins')->factory()->getTTL() * 60
        ]);
    }

}
