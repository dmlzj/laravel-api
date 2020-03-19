<?php

namespace App\Http\Requests;

/**
 * @bodyParam name string required 用户名
 */
class UserUpdateRequest extends FormRequest
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
        ];
    
    }
    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.max' => '用户名最大长度为50个字符',
        ];
    }
}
