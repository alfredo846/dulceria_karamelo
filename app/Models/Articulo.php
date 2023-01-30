<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Articulo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'articulos';
    
    protected $primaryKey = 'articulo_id';

    protected $fillable = [
        'producto_id',
        'sucursal_id',
        'precio_compra_empaque',
        'precio_venta_empaque',
        'precio_compra_unidad',
        'precio_venta_unidad',
        'stock_minimo',
        'stock_maximo',
        'inventario_inicial_empaque',
        'inventario_inicial_unidad',
    ];
}
