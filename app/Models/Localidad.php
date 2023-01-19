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
        'municipio_id',
        'nombre',
    ];
}
