<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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

            'couponName'=>'required|min:2|max:50|unique:Coupons,name',
            'couponCode'=>'required|min:2|max:50',
            'couponTime'=>'required|min:2|max:50',
            'couponNumber'=>'required|min:2|max:50'
        ];
    }

    public function messages(){
        return [
            'couponName.required' =>'Tên Mã Giảm không không được để trống',
            'couponName.min' =>'Tên Mã Giảm phải lớn hơn 2 ký tự',
            'couponName.max' =>'Tên Mã Giảm phải nhỏ hơn 50 ký tự',
            'couponName.unique' =>'Tên Mã Giảm đã tồn tại',

            'couponCode.required' =>'Mã Giảm không không được để trống',
            'couponCode.min' =>'Mã Giảm phải lớn hơn 2 ký tự',
            'couponCode.max' =>'Mã Giảm phải nhỏ hơn 50 ký tự',

            'couponTime.required' =>'Số lượng Mã Giảm không không được để trống',
            'couponTime.min' =>'Số lượng Mã Giảm phải lớn hơn 2 ký tự',
            'couponTime.max' =>'Số lượng Mã Giảm phải nhỏ hơn 50 ký tự',

            'couponNumber.required' =>'Số % hoặc Tiền Mã Giảm không không được để trống',
            'couponNumber.min' =>'Số % hoặc Tiền Mã Giảm phải lớn hơn 2 ký tự',
            'couponNumber.max' =>'Số % hoặc Tiền Mã Giảm phải nhỏ hơn 50 ký tự'
        ];
    }
}
