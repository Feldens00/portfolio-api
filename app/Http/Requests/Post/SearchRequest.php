<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'term' => 'required|string|min:3',
        ];
    }
}
