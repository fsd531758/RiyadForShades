<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MasterDataRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'file' => 'required_without:id|max:5000|mimes:xlsx,xls,doc,docx,ppt,pptx,txt,pdf',
            'date' => 'nullable|date',
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.title' => ['required', 'string',Rule::unique('master_data_translations','title')->ignore($this->id, 'master_data_id')]];
            $rules += [$locale . '.description' => ['required', 'string','max:300']];
        }

        return $rules;
    }
}
