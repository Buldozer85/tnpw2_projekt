<?php

namespace App\Http\Requests\App;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required_with:password']

        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Křestní jméno je povinné',
            'first_name.string' => 'Křestní jméno musí být textový řetězec',
            'last_name.required' => 'Příjmení je povinné',
            'last_name.string' => 'Příjmení musí být textový řetězec',
            'email.required' => 'E-mail je povinný',
            'email.string' => 'E-mail musí být textový řetězec',
            'email.unique' => 'Účet s tímto e-mailem již existuje',
            'password.required' => 'Heslo je povinné',
            'password.string' => 'Heslo musí být textový řetězec',
            'password.confirmed' => 'Zadaná hesla se neshodují',
            'password_confirmation.required_with' => 'Heslo znovu musí být vyplněno',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
