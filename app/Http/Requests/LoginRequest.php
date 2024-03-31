<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email je povinný',
            'email.email' => 'Email není ve správném formátu',
            'password.required' => 'Heslo je povinné',
            'password.string' => 'Heslo musí být textový řetězec'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
