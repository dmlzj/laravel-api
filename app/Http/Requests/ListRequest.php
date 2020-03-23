<?php

namespace App\Http\Requests;

/**
 * @urlParam columns string required 请求字段 Example: id,name
 * @urlParam order_by string 排序条件 Example: id,asc
 * @urlParam limit int 限制条数 Example: 5
 * @urlParam page int 当前页数 Example: 1
 * @urlParam include string 关联表 Example: posts,permissions
 */
class ListRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            // 'columns' => ['required', 'string'],
        ];
    
    }
    public function messages()
    {
        return [
            'columns.required' => '请求字段不能为空',
        ];
    }
}
