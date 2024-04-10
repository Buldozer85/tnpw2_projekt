<?php

namespace App\Http\Requests\App;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'review' => ['required', 'string'],
            'rating' => ['required', 'numeric', 'max:10', 'min:0'],
        ];
    }

    public function messages()
    {
        return [
            'review.required' => 'Slovní komentář recenze je povinný',
            'review.string' => 'Slovní komentář musí být textový řetězec',
            'rating.required' => 'Číselné hodnocené je povinné',
            'rating.numeric' => 'Hodnocení musí být číslo',
            'rating.max' => 'Hodnocení musí být maximálně 10',
            'rating.min' => 'Hodnocení musí být minimálně 0'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
