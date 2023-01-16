<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = 'municipios';

    protected $primaryKey = 'municipio_id';

    protected $fillable = [
        'nombre',
        'estado_id',
    ];

    public static function municipios ($estado_id){
        return Municipio::where('estado_id', '=', 'estado_id')
        ->get();
    }
}
