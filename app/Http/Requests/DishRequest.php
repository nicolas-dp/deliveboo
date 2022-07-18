<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishRequest extends FormRequest
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
            'name' => 'required|max:50',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'ingredients' => 'nullable',
            'cover_image' => 'nullable',
            'is_availability' => 'required',
            'restaurant_id' => ['exists:restaurants,id'],
        ];
    }
}
