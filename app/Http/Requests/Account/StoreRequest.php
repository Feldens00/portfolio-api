<?php

namespace App\Http\Requests\Account;

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
            'user_id' => 'required|exists:users,id',
            'balance' => 'nullable|numeric|min:0',
            'status' => 'required|string|in:active,inactive',
            'account_number' => 'required|string|unique:accounts,account_number',
        ];
    }
}
