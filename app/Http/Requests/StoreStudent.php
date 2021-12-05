<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudent extends FormRequest
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
            'roll_no' => 'required',
            'name' => 'bail|required|min:3|max:20',
            'email' => 'required',
            'gender' => 'required',
            'year' => 'required',
            'department_id' => 'required',
            'address' => '',
        ];
    }
}
