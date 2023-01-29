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
        'precio_compra',
        'precio_venta',
        'stock_minimo',
        'stock_maximo',
        'stock_empaque',
        'stock_unidad',
    ];
}
