<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdCuota extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'tipo_consultor',
        'tipo_venta',
        'personal',
        'cantidad_cuota',
        'mes',
        'año',
        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',
     ] ;

    protected $table='bsd_cuota';
}
