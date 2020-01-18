<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array
     */
    public function rules()
    {
        return [
            'size_title' => 'required|min:3',
            'description' => 'required|min:3',
            'price' => 'required|numeric|between:0,999.99',
            'discount' => 'nullable|numeric|between:0,999.99',
            'priority' => 'required|min:0|integer',
            'type_id' => 'required|integer|exists:types,id',
            'group_id' => 'required|integer|exists:groups,id',
            'photo' => 'file|image|mimes:jpeg,bmp,png,jpg|max:2000',
            'ingredients' => 'required|array|min:1',
            'ingredients.*' => 'required|numeric|distinct|exists:ingredients,id',
        ];
    }
}
