<?php

namespace App\Http\Requests;

/**
 * @bodyParam name string required 用户名
 * @bodyParam password string required 密码
 * @bodyParam passwrod_confirmation string required 确认密码
 */
class UserRegistRequest extends FormRequest
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
            // 'name' => ['required', 'max:50', 'unique:users,name'],
            'password' => ['required', 'max:50', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'same:password']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.max' => '用户名最大长度为50个字符',
            'password.required' => '密码不能为空',
            'password.max' => '密码长度不能超过50个字符',
            'password.min' => '密码长度不能小于6个字符',
            'password.confirmed' => '两次密码不一致',
            'password_confirm.required' => '请输入确认密码'
            
        ];
    }
}
