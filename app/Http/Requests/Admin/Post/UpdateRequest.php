<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'image' =>'nullable|image',
            'likes' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'is_published' => '',
            'tags' => 'nullable|array',
            'tags.*' => "nullable|integer|exists:tags,id"
        ];
    }
}
