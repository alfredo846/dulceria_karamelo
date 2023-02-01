<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ventas';

    protected $primaryKey = 'venta_id';

    protected $fillable = [
        'fecha_venta',
        'user_id',
        'subtotal',
        'total',
    ];
}
