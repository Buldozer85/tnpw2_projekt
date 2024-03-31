<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShowRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => ['required'],
            'name' => ['required'],
            'date_of_premiere' => ['required', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
