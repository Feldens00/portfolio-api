<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'image' => 'nullable|string',
            'description' => 'sometimes|required|string',
            'content' => 'nullable|string',
            'published' => 'sometimes|required|boolean',
            'published_at' => 'nullable|date',
        ];
    }
}
