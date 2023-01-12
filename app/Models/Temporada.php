<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Temporada extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'temporadas';

    protected $primaryKey = 'temporada_id';

    protected $fillable = [
        'nombre',
        'imagen'
    ];
}
