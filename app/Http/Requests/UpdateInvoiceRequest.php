<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_edit');
    }

    public function rules()
    {
        return [
            'customer_id' => [
                'required',
                'integer',
            ],
            'invoice_number' => [
                'string',
                'nullable',
            ],
            'invoice_date' => [
                'required',
                'date_format:'.config('panel.date_format'),
            ],
            'due_date' => [
                'date_format:'.config('panel.date_format'),
                'nullable',
            ],
            'subtotal' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tax' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
