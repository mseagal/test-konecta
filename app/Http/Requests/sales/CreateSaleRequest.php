<?php

namespace App\Http\Requests\sales;

use App\Rules\StockExistence;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateSaleRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_id' => [
                'required',
                Rule::exists('products','id')
            ],
            'quantity' => [
                'required','numeric','min:1',
                new StockExistence($this->product_id)
            ]
        ];
    }
}
