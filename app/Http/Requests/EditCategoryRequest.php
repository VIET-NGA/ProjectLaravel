<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            // 'categoryName'=>'required|min:2|max:100|unique:tbl_category,category_name|unique:tbl_category,category_id,',
            'categoryName'=>'required|min:2|max:100',
        ];
    }

    public function messages(){
        return [
            'categoryName.required' => 'Tên Danh Mục không được để trống',
            'categoryName.min' => 'Tên Danh Mục phải lớn hơn 2 ký tự',
            'categoryName.max' => 'Tên Danh Mục phải nhỏ hơn 100 ký tự',
        ];
    }
}
