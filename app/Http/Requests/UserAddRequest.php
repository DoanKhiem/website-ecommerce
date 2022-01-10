<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
            'last_name'=>'required|max:10',
            'email'=>'required|email|unique:users,email,'.request()->id,
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ];
    }
    public function messages()
    {
        return [
            'last_name.required' => 'Trường tên không được để trống',
            'last_name.unique' => "Tên $this->last_name đã tồn tại",
            'email.required' => 'Trường email không được để trống',
            'email.email' => 'Địa chỉ email không hợp lệ',
            'email.unique' => "Tên $this->email đã tồn tại",
            'password.required' => "Vui lòng nhập mật khẩu",
            'confirm_password.required' => 'Vui long nhap lại mật khẩu',
            'confirm_password.same' => 'Mật khẩu xác nhận không đúng'
        ]; // TODO: Change the autogenerated stub

    }
}