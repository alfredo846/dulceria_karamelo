<?php

namespace App\Http\Requests\Productos;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductoRequest extends FormRequest
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
            'codigo_empaque'      => 'required|unique:productos,codigo_empaque|max:14',
            'codigo_pieza'        => 'unique:productos,codigo_pieza|max:14',
            'nombre'              => 'required|unique:productos,nombre|max:60|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/',
            'descripcion'         => 'required|unique:productos,descripcion|max:60|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/',
            'imagen'              => ['image', 'max:2048'],
            'categoria_id'        => 'required',
            'marca_id'            => 'required',
            'temporada_id'        => 'required',
            'empaque_id'          => 'required',
            'piezas_por_empaque'  => 'required|numeric',
        ];
    }
}
