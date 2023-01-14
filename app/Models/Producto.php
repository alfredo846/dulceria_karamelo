<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'productos';

    protected $primaryKey = 'producto_id';

    protected $fillable = [
        'codigo_barras',
        'nombre',
        'descripcion',
        'imagen',
        'categoria_id',
        'marca_id',
        'temporada_id',
        'empaque_id',
        'piezas_por_empaque',
    ];
}
