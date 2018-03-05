<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcocuntRequest extends FormRequest
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
            'txtName'=>'required|unique:Account,Name',
            'txtPass'=>'required',
            'txtImage'=>'image|max:150'
        ];
    }
    public function message(){
        return [
            'txtName.required'=>'vui lòng nhập họ tên',
            'txtPass.required'=>'vui lòng nhập pass',
        ];
    }
}
