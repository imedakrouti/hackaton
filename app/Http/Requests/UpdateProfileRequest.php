<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'required|email|unique:users,email,'.$this->user->id,
            'address'=>'required|string',
            'phone' => 'required|numeric|min:8,max:11',
            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ];
    }
}
