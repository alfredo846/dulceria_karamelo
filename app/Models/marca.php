<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class marca extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "marcas";

    protected $primarykey = "marca_id";

    protected $fillable = [
        'nombre',
    ];



}
