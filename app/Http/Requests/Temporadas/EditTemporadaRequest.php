<?php

namespace App\Http\Requests\Temporadas;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditTemporadaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => ['required', 'max:60', 'regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/', Rule::unique('temporadas','nombre')->ignore($this->temporada)],
            'imagen' => ['image', 'max:2048'],
        ];
    }
}
