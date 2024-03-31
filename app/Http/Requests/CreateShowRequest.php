<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateShowRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => ['required', Rule::in(['series', 'movie'])],
            'name' => ['required', 'string', Rule::unique('shows', 'name')],
            'date_of_premiere' => ['required', 'date'],
            'file_input' => ['required', 'image'],
            'count_of_seasons' => [Rule::requiredIf(fn() => $this->request->get('type') === 'series'), 'integer', 'nullable'],
            'count_of_episodes' => [Rule::requiredIf(fn() => $this->request->get('type') === 'series'), 'integer', 'nullable'],
            'length' => ['required', 'integer'],
            'still_running' => ['bool', 'nullable']
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'Typ je povinný',
            'type.in' => 'Zadaný typ neexistuje',
            'date_of_premiere.required' => 'Datum premiéry je povinný údaj',
            'date_of_premiere.date' => 'Datum premiéry je ve špatném formátu',
            'file_input.required' => 'Náhledový obrázek je povinný',
            'file_input.image' => 'Náhledový obrázek je v nepodporovaném formátu',
            'count_of_seasons.required' => 'Počet sérií je povinný údaj pro seriál',
            'count_of_episodes.required' => 'Počet epizod je povinný údaj pro seriál',
            'length.required' => 'Délka je povinný údaj',
            'length.integer' => 'Délka musí být číslo'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
