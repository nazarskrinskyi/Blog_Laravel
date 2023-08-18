<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone_number' => 'nullable|numeric',
            'address' => 'nullable|string|max:255',
            'telegram' => 'nullable|string|max:255|regex:/^[a-zA-Z0-9_]+$/',
            'twitter' => 'nullable|string|max:255|regex:/^@[a-zA-Z0-9_]+$/',
            'instagram' => 'nullable|string|max:255|regex:/^[a-zA-Z0-9_]+$/',
            'facebook' => 'nullable|string|max:255|regex:/^[a-zA-Z0-9_]+$/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the max file size as needed
        ];
    }
}
