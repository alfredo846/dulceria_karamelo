<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sucursal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sucursals';

    protected $primaryKey = 'sucursal_id';

    protected $fillable = [
        'numero_sucursal',
        'imagen',
        'nombre',
        'estado_id',
        'municipio_id',
        'localidad_id',
        'telefono',
        'email',
    ];

}
