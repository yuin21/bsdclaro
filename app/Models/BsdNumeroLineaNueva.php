<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdNumeroLineaNueva extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'bsd_detalle_venta_id',
        'numero_linea_nueva',
        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',
     ] ;

    protected $table='bsd_numero_linea_nueva';

    
}
