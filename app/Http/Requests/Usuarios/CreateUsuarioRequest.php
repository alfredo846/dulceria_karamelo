<?php

namespace App\Http\Requests\Usuarios;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsuarioRequest extends FormRequest
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
            'nombre'              => 'required|max:60|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,0-9]+$/',
            'apellido_paterno'    => 'required|max:60|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,0-9]+$/',
            'apellido_materno'    => 'required|max:60|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,0-9]+$/',
            'foto'                => ['image', 'max:2048'],
            'genero'              => 'required',
            'telefono'            => 'required|max:10',
            'username'            => 'required|unique:users,username|max:60',
            'email'               => 'required|email|unique:users,email|max:60',
            'password'            => 'required',
            'rol_id'              => 'required',
        ];
    }
}
