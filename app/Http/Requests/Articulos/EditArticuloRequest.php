<?php

namespace App\Http\Requests\Articulos;

use Illuminate\Foundation\Http\FormRequest;

class EditArticuloRequest extends FormRequest
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
                'precio_compra_empaque'       => 'required',
                'precio_venta_empaque'        => 'required',
                'precio_compra_unidad'        => 'required',
                'precio_venta_unidad'         => 'required',
                'stock_minimo'                => 'required',
                'stock_maximo'                => 'required',
                'inventario_inicial_empaque'  => 'required',
                'inventario_inicial_unidad'   => 'required',
        ];
    }
}
