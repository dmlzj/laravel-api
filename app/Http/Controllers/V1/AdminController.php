<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;

use App\Http\Requests\UserRegistRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserLoginRequest;

class AdminController extends Controller
{
    public function __construct() {
    }
    /**
     * @group admins
     * admin user regist
     */
    public function register(UserRegistRequest $request) {
        $name = $request->name;
        $password = $request->password;

        $admin = Admin::where('name', $name)->first();
        if ($admin) {
            return $this->failed('用户已被注册');
        }

        $password = Hash::make($password);
        $admin = Admin::create([
            'name' => $name,
            'password' => $password
        ]);
        return $this->success($admin);

    }

    /**
     * @group admins
     * admin user login
     * @param UserLoginRequest $request
     */
    public function login(UserLoginRequest $request)
    {
        $name = $request->name;
        $password = $request->password;


        $admin = Admin::where('name', $name)->first();
        if (!$admin || !Hash::check($password, $admin->password)) {
            return $this->failed('用户名或密码错误');
        }

        $credentials = request(['name', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return $this->failed('用户名或密码错误');
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
        return $this->success('退出登录成功');
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
        return $this->success([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth()->factory()->getTTL()
        ]);        
    }

}
