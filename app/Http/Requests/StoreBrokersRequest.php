<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrokersRequest extends FormRequest
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
            'name' => ['required', 'unique:brokers', 'max:255'],
            'address' => ['required', 'max:255'],
            'city' => ['required'],
            'zip_code' => ['required'],
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'logo_path' => ['required']
        ];
    }
}
