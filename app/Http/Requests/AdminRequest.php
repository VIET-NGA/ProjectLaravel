<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'admin_email'=>'required|email',
            'admin_password'=>'required|min:5|max:50'
        ];
    }

    public function messages(){
        return [
            'admin_email.email'=>'vui lòng nhập đúng định dang email',
            'admin_email.required'=>'Email không được để trống',
            'admin_password.required'=>'Mật khẩu không được để trống',
            'admin_password.min'=>'Mật khẩu không được nhỏ hơn 5 ký tự',
            'admin_password.max'=>'Mật khẩu không được lớn hơn 50 ký tự'
        ];
    }
}
