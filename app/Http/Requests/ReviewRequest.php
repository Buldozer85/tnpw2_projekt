<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => ['required'],
            'rating' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
