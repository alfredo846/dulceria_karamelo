<?php

namespace App\Http\Requests\Marcas;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditMarcaRequest extends FormRequest
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
              'nombre' => ['required', 'max:60', 'regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/', Rule::unique('marcas','nombre')->ignore($this->marca)],
              'imagen' => ['image', 'max:2048'],
        ];
    }
}
