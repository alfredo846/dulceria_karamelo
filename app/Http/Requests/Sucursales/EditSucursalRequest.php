<?php

namespace App\Http\Requests\Sucursales;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditSucursalRequest extends FormRequest
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
            'numero_sucursal'     => ['required', 'max:3', Rule::unique('sucursals','numero_sucursal')->ignore($this->sucursale)],
            'imagen'              => ['image', 'max:2048'],
            'nombre'              => ['required', 'max:60', 'regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,0-9]+$/', Rule::unique('sucursals','nombre')->ignore($this->sucursale)],
            // 'estado_id'           => 'required',
            // 'municipio_id'        => 'required',
            // 'localidad_id'        => 'required',
            'telefono'            => 'max:10',
            'email'               => ['required', 'email', 'max:60',  Rule::unique('sucursals','email')->ignore($this->sucursale)],
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
