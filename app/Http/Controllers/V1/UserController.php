<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Log;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Requests\UserRequest;
use App\Events\LoginEvent;
use App\Jobs\UserTest;

class UserController extends Controller
{
    public function index() {
        $users = QueryBuilder::for(User::class)
            ->allowedFilters('name')
                  ->allowedFields(['id', 'name'])
                  ->get()->toArray();
        return $this->success($users);
    }

    public function show($id) {
        // return view('user.profile', ['user' => User::findOrFail($id)]);
        $query = User::where('id', $id);
        $users = QueryBuilder::for($query)
            ->allowedFields(['id', 'name'])
                  ->get();
        return $this->success($users[0]);
    }

    public function update(Request $request, $id) {
        dd($id);
    }
    public function register(UserRequest $request) {
        $name = $request->name;
        $password = $request->password;
        
        $user = User::where('name', $name)->first();
        if ($user) {
            // return response()->json(['success' => false, 'message' => '用户已被注册！']);
            return $this->failed('用户已被注册');
        }

        $password = Hash::make($password);
        $user = User::create([
            'name' => $name,
            'password' => $password
        ]);
        return $this->success($user);
    }

    /***
     * 用户登录
     * @param Request $request
     */
    public function login(Request $request)
    {
        $name = $request->name;
        $password = $request->password;

        if (!$name || !$password) {
            // return response()->json(['success' => false, 'message' => '用户名或密码填写错误！']);
            return $this->failed('用户名或密码填写错误');
        }

        $user = User::where('name', $name)->first();
        if (!$user) {
            // return response()->json(['success' => false, 'message' => '用户不存在！']);
            // return $this->failed('用户不存在');
            return $this->failed('用户名或密码错误');

        }

        if (!Hash::check($password, $user->password)) {
            return $this->failed('用户名或密码错误');
            // return response()->json(['success' => false, 'message' => '密码填写错误！']);
        }

        $credentials = request(['name', 'password']);
        if (!$token = auth('users')->attempt($credentials)) {
            return $this->failed('用户名或密码错误');
            // return response()->json(['error' => 'Unauthorized'], 401);
        }
        // 触发事件
        event(new LoginEvent($user));

        // 分发异步任务
        UserTest::dispatch($user)
            ->delay(now()->addSeconds(5));
        return $this->respondWithToken($token);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return $this->success('退出登录成功');
        // return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('users')->refresh());
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
            'expires_in' => auth('users')->factory()->getTTL() * 60
        ]);
        // return response()->json();
    }
}
