<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DepartmentRequset extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required|unique:departments,name',
            'phone' => 'required|max:11',
        ];
    }

    public function messages() {
        return [
            'name.required' => trans('/MESSAGES.REQUIRED'),
            'name.unique' => trans('/MESSAGES.UNIQUE'),
            'phone.required' => trans('/MESSAGES.REQUIRED'),
        ];
    }

}
