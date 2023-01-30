<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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

    public function rules()
    {
        $rules = [
            'name' =>  'required' ,
            'phone' =>  'required' ,
            'address' =>  'required' ,
        ];

        return  $rules;
    }
    public function messages()
    {
        $messages = [
            'name.required' => trans('requests.name'),
            'phone.required' => trans('requests.phone'),
            'address.required' => trans('requests.address'),
        ];

        return $messages;
    }
}
