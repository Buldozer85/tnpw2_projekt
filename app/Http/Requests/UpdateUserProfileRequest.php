<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email', 'max:254', Rule::unique('users', 'email')->ignore($this->user()->id)],
            'password' => ['nullable', 'confirmed'],
            'password_confirmation' => ['required_with:password']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
