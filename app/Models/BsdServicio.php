<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdServicio extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombre_servicio',
        'tipo_servicio',
        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',  
     ] ;

    protected $table='bsd_servicio';
}
