<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SiteInfoRequest extends Request {


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
            'site_id'      => 'required',
            'site_name'    => 'required',
            'site_address' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'site_id.required'      => 'Site ID field is required',
            'site_name.required'    => 'Site Name field is required',
            'site_address.required' => 'Site Address field is required',
        ];
    }

}
