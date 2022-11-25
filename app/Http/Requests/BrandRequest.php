<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'brandName'=>'required|min:2|max:100|unique:tbl_brand,brand_name',
        ];
    }

    public function messages(){
        return [
            'brandName.required' =>'Tên Thương Hiệu không được để trống',
            'brandName.min' =>'Tên Thương Hiệu phải lớn hơn 2',
            'brandName.max' =>'Tên Thương Hiệu phải nhỏ hơn 100',
            'brandName.unique' =>'Tên Thương Hiệu đã tồn tại'
        ];
    }
}
