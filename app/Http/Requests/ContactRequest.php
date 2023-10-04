<?php

namespace App\Http\Requests;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ContactRequest extends FormRequest
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
            'name'  => 'required', 'string',
            'email' => 'required', 'string', 'email',
            'phone' => 'required', 'string',
            'phone'  => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:6|max:30',
            'message' => 'required', 'string',
        ];
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'حقل الإسم مطلوب',
            'email.required' => 'حقل البريد الإلكتروني  مطلوب',
            'email.email' => 'يرجى إدخال ضيغة بريد إلكتروني صحيحة',
            'phone.required' => 'حقل الجوال مطلوب',
            'message.required' => 'حقل الرسالة مطلوب',
        ];

        return $messages;
    }
}
