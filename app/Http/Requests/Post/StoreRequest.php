<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'image' => 'nullable|string',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'published' => 'required|boolean',
            'published_at' => 'nullable|date',
        ];
    }
}
