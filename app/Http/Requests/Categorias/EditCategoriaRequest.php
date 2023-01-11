<?php

namespace App\Http\Requests\Categorias;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditCategoriaRequest extends FormRequest
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
            'nombre' => ['required', 'max:60', 'regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/', Rule::unique('categorias','nombre')->ignore($this->categoria)],
              'imagen' => ['image', 'max:2048'],
        ];
    }
}
