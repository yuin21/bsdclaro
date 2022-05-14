<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'bsd_tipo_servicio_id',
        'nombre_plan',
        'precio',
        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',  
     ] ;

    protected $table='bsd_plan';

    public function tiposervicio(){
        return $this->belongsTo('App\Models\BsdTipoServicio', 'bsd_tipo_servicio_id');
    }
}
