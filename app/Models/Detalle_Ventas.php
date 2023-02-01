<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detalle_Ventas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'detalle_ventas';

    protected $primaryKey = 'detalle_venta_id';

    protected $fillable = [
        'venta_id',
        'articulo_id',
        'cantidad_empaque',
        'cantidad_unidad',
        'total',
    ];
}
