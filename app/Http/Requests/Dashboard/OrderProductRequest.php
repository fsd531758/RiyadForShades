<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class OrderProductRequest extends FormRequest
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
            'product_id' =>  'required' ,
            'count' =>  'required' ,
        ];

        return  $rules;
    }
    public function messages()
    {
        $messages = [
            'product_id.required' => trans('requests.product'),
            'count.required' => trans('requests.count'),
        ];

        return $messages;
    }
}
