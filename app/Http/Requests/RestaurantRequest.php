<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RestaurantRequest extends FormRequest
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
            'name' => ['required', Rule::unique('restaurants')->ignore($this->restaurant), 'max:50'],
            'category_id' => ['required','exists:categories,id'],
            'description' => ['nullable'],
            'address' => ['required'],
            'description' => ['nullable'],
            'delivery_cost' => ['required'],
            'opening_hours' => ['nullable'],
            'closing_hours' => ['nullable'],
            'phone_number' => ['required', 'max:50'],
            'cover_image' => ['nullable'],
            'PIVA' => ['required', 'max:11'],
        ];
    }
}
