<?php

namespace App\Http\Requests\products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProductRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'ref' => 'required|string|min:1',
            'price' => 'required|numeric|min:50',
            'weight' => 'required|numeric|min:1',
            'category_id' => [
                'required',
                Rule::exists('categories','id')
            ]
        ];
    }
}
