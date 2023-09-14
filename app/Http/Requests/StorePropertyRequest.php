<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'address' => ['required', 'max:225'],
            'listing_type' => ['required'],
            'city' => ['required'],
            'zip_code' => ['required', 'numeric'],
            'description' => ['required'],
            'build_year' => ['required'],
            'price' => ['required'],
            'bedrooms' => ['required'],
            'sqrt' => ['required'],
            'price_sqrt' => ['required'],
            'property_type' => ['required'],
            'status' => ['required']
        ];
    }
}