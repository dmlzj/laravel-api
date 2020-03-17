<?php

namespace App\Http\Requests;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
        case 'GET':
        {
            return [
                'id' => ['required,exists:users,id']
            ];
        }
        case 'POST':
        {
            return [
                'name' => ['required', 'max:50'],
                // 'name' => ['required', 'max:50', 'unique:users,name'],
                'password' => ['required', 'max:50', 'min:6', 'confirmed'],
                'password_confirmation' => ['required', 'same:password']
            ];
        }
        case 'PUT':
        case 'PATCH': {
            return [
                'name' => ['required', 'max:50'],
            ];
        }
        case 'DELETE':
        default:
        {
            return [

            ];
        }
        }
    }
    public function messages()
    {
        return [
            'id.required'=>'用户ID必须填写',
            'id.exists'=>'用户不存在',
            'name.unique' => '用户名已经存在',
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
