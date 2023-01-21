<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFeatureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('feature_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:features,name,'.request()->route('feature')->id,
            ],
        ];
    }
}
