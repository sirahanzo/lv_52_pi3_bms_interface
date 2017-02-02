<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NetworkRequest extends Request {


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
            //
            'ipaddress' => 'required|ip',
            'netmask'   => 'required|ip',
            'gateway'   => 'required|ip',
        ];
    }


    public function messages()
    {
        return [
            //'ipaddress.required' => 'The IPaddress field id required',
            //'netmask.required' => 'The Subnet Mask field id tequired',
            //'gateway.required' => 'The Gateway Mask field id tequired',
        ];
    }
}
