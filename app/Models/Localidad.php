<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;

    protected $table = 'localidads';

    protected $primaryKey = 'localidad_id';

    protected $fillable = [
        'nombre',
        'municipio_id',
        'codigo_postal',
    ];
}