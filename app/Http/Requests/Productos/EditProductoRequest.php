<?php

namespace App\Http\Requests\Productos;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditProductoRequest extends FormRequest
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
            'codigo_barras'       => ['required', 'max:14', Rule::unique('productos','codigo_barras')->ignore($this->producto)],
            'nombre'              => ['required', 'max:60', 'regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,0-9]+$/', Rule::unique('productos','nombre')->ignore($this->producto)],
            'descripcion'         => ['required', 'max:60', Rule::unique('productos','descripcion')->ignore($this->producto)],
            'imagen'              => ['image', 'max:2048'],
            'categoria_id'        => 'required',
            'marca_id'            => 'required',
            'temporada_id'        => 'required',
            'empaque_id'          => 'required',
            'piezas_por_empaque'  => 'required|numeric',
        ];
    }
}
