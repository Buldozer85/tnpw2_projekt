<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required_with:password']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
