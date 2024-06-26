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

    public function messages()
    {
        return [
            'first_name.required' => 'Křestní jméno je povinné',
            'first_name.string' => 'Křestní jméno musí být textový řetězec',
            'last_name.required' => 'Příjmení je povinné',
            'last_name.string' => 'Příjmení musí být textový řetězec',
            'email.required' => 'E-mail je povinný',
            'email.string' => 'E-mail musí být textový řetězec',
            'email.unique' => 'Účet s tímto e-mailem již existuje',
            'password.confirmed' => 'Zadaná hesla se neshodují',
            'password_confirmation.required_with' => 'Heslo znovu musí být vyplněno',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
