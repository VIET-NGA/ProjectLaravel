<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'productName'=>'required|min:5|max:100',
            'imageName'=>'mimes:jpeg,jpg,png,gif,svg|max:10240',
            'price'=>'required'
        ];
    }

    public function messages(){
        return [
            'productName.required'=>'Tên Sản phẩm không được để trống',
            'productName.min'=>'Tên Sản Phẩm không được nhỏ hơn 5 ký tự',
            'productName.max'=>'Tên Sản Phẩm không được lớn hơn 100 ký tự',

            'imageName.mimes'=>'Tên hình ảnh phải là tệp thuộc loại: jpeg, jpg, png, gif, svg',
            'imageName.max'=>'file hình ảnh tối đa là 10MB',

            'price.required' =>'Đơn giá không được để trống'
        ];
    }
}
