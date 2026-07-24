<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStockTransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'product_id' => [
                'required',
                'exists:products,id',
            ],

            'type' => [
                'required',
                'in:IN,OUT',
            ],

            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],

            'note' => [
                'nullable',
                'string',
                'max:1000',
            ],

        ];
    }
}