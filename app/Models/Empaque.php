<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empaque extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'empaques';

    protected $primaryKey = 'empaque_id';

    protected $fillable = [
        'nombre',
    ];
}
