<?php

namespace App\Http\Requests\Account;

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
            'balance' => 'nullable|numeric|min:0',
            'status' => 'sometimes|required|string|in:active,inactive',
        ];
    }
}
