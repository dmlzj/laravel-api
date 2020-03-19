<?php

namespace App\Http\Requests;

/**
 * @bodyParam name string required 用户名
 * @bodyParam password string required 密码
 */
class UserLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => ['required', 'max:50'],
            'password' => ['required', 'max:50', 'min:6']
        ];
    
    }
    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.max' => '用户名最大长度为50个字符',
            'password.required' => '密码不能为空',
            'password.max' => '密码长度不能超过50个字符',
            'password.min' => '密码长度不能小于6个字符'
        ];
    }
}
