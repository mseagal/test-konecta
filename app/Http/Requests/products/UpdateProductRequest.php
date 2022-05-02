<?php

namespace App\Http\Requests\products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'name' => 'string|min:3',
            'ref' => 'string|min:1',
            'price' => 'numeric|min:50',
            'weight' => 'numeric|min:1',
            'category_id' => [
                Rule::exists('categories','id')
            ]
        ];
    }
}
