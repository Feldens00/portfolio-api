<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'user_id' => 'nullable|integer|exists:users,id',
            'published' => 'nullable|boolean',
            'sort' => 'nullable|string|in:title,created_at,published_at',
        ];
    }
}
