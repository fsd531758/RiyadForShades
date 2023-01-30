<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
        $rules=[];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.title' => ['required', 'string']];
        }
        return  $rules;
    }

    public function messages()
    {
        $messages = [];
        foreach (config('translatable.locales') as $locale) {
            $messages += [$locale . '.title.required' => trans('requests.title_required_' . $locale)];
        }
        return $messages;
    }
}
