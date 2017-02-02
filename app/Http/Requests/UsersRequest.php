<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersRequest extends Request {


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
        $rules = [
            'name'     => 'required|max:255',
            'password' => 'required|min:6|confirmed',
            'level'    => 'required',
        ];

        if (!$this >= $this->has('id')) {
            $rules += [
                'username' => 'required|max:25|unique:users'
            ];
        }


        return $rules;
    }


    public function messages()
    {
        return [
            'name.required'     => 'The Full Name field is required',
            'username.required' => 'The User Name field is required',
            'email.required'    => 'The Email Address field is required',

        ];
    }
}
