<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'icon' => 'nullable|string',
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.title' => ['required', 'string', Rule::unique('feature_translations', 'title')->ignore($this->id, 'feature_id')]];
            $rules += [$locale . '.description' => ['nullable', 'string']];
        }

        return $rules;
    }


}
