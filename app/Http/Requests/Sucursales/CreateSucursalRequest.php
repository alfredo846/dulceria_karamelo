<?php

namespace App\Http\Requests\Sucursales;

use Illuminate\Foundation\Http\FormRequest;

class CreateSucursalRequest extends FormRequest
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
            'numero_sucursal'     => 'required|unique:sucursals,numero_sucursal|max:3',
            'imagen'              => ['image', 'max:2048'],
            'nombre'              => 'required|unique:sucursals,nombre|max:60|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,0-9]+$/',
            'estado_id'           => 'required',
            'municipio_id'        => 'required',
            'localidad_id'        => 'required',
            'telefono'            => 'max:10',
            'email'               => 'required|email|unique:sucursals,email|max:60',
        ];
    }

     public function messages()
    {
        return [
            'numero_sucursal.required'   => 'El campo Número de sucursal es obligatorio.',
            'numero_sucursal.max'        => 'Número de Sucursal no debe ser mayor que 3 caracteres.',
            'numero_sucursal.unique'     => 'El campo Número de Sucursal ya ha sido registrado.'
        ]; 
    }
}
