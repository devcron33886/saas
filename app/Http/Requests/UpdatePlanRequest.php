<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePlanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('plan_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'price' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:plans,price,'.request()->route('plan')->id,
            ],
            'stripe_identifier' => [
                'string',
                'required',
                'unique:plans,stripe_identifier,'.request()->route('plan')->id,
            ],
            'billing_period' => [
                'string',
                'required',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
