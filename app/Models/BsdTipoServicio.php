<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdTipoServicio extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom_tipo_servicio',
        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',  
     ] ;
     
    protected $table='bsd_tipo_servicio';
}
