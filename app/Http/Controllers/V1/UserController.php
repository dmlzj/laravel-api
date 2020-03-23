<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Log;
// use Spatie\QueryBuilder\QueryBuilder;
use Unlu\Laravel\Api\QueryBuilder;
use Unlu\Laravel\Api\RequestCreator;
use App\Http\Requests\UserRegistRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\ListRequest;


use App\Events\LoginEvent;
use App\Jobs\UserTest;
use Auth;

class UserController extends Controller
{
    /**
     * @group users
     * user list
     * @param ListRequest $request
     */
    public function index(ListRequest $request) {
         $queryBuilder = new QueryBuilder(new User, $request);
         $users =  $queryBuilder->build()->paginate();
        return $this->success($users);
    }
    /**
     * @group users
     * user info
     * @urlParam id required 用户id Example: 1
     * @apiResponse User
     */
    public function show($id, Request $request) {
        $params['id'] = $id;
        if ($request->columns) {
            $params['columns'] = $request->columns;
        }
        $request = RequestCreator::createWithParameters($params);        
        $queryBuilder = new QueryBuilder(new User, $request);
        $data = $queryBuilder->build()->firstOrFail();
        return $this->success($data);
        
    }
    /**
     * @group users
     * user update
     */
    public function update(UserUpdateRequest $request, $id) {
        if (auth()->user()->id !== intVal($id)) {
            return $this->failed('抱歉您没有权限', 401);
        }
        
        $name = $request->name;
        $user = User::where('name', $name)->first();
        if ($user) {
            return $this->failed('用户名已被占用');
        }

        $user = User::find($id);
        $user->name = $name;
        $user->save();
        return $this->success('修改成功');
    }
    /**
     * @group users
     * user regist
     */
    public function register(UserRegistRequest $request) {
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

    /**
     * @group users
     * user login
     * @param UserLoginRequest $request
     * @response {
     *"status": "success",
     *"code": 200,
     *"data": {
     *"access_token": "vHuXHhe5sI",
     *"token_type": "Bearer",
     *"expires_in": 3600
     *}
     *}
     */
    public function login(UserLoginRequest $request)
    {
        $name = $request->name;
        $password = $request->password;

        $user = User::where('name', $name)->first();
        if (!$user || !Hash::check($password, $user->password)) {
            return $this->failed('用户名或密码错误');
        }

        $credentials = request(['name', 'password']);
        // 获取当前守护的名称
        $present_guard =Auth::getDefaultDriver();
        if (!$token = Auth::claims(['guard'=>$present_guard])->attempt($credentials)) {
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
     * @group users
     * user logout
     */
    public function logout()
    {
        auth()->logout();
        return $this->success('退出登录成功');
        // return response()->json(['message' => 'Successfully logged out']);
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
        // return response()->json();
    }
}
