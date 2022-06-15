<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdDetalleVenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'bsd_venta_id',
        'bsd_plan_id',
        'bsd_servicio_id',
        'bsd_tipo_servicio_id',
        'bsd_estado_linea_id',
        'cantidad',
        'equipo_producto',
        'precio_plan',
        'cf_con_igv',
        'cf_sin_igv',
        'equipo_producto',
        'operador',
        //'estado_linea',
        'fecha_activado',
        //'fecha_liquidado',
        //'status_100_por',
        //'numero_proyecto',
        //'fecha_instalacion',
        'hora',
        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',  
     ] ;
     

    protected $table='bsd_detalle_venta';

    public function servicio(){
        return $this->belongsTo('App\Models\BsdServicio', 'bsd_servicio_id');
    }
    public function tipoServicio(){
        return $this->belongsTo('App\Models\BsdTipoServicio', 'bsd_tipo_servicio_id');
    }
    public function plan(){
        return $this->belongsTo('App\Models\BsdPlan', 'bsd_plan_id');
    }
    public function numerosLineaNueva(){
        return $this->hasMany('App\Models\BsdNumeroLineaNueva', 'bsd_detalle_venta_id');
    }
    public function estadoLinea(){
        return $this->belongsTo('App\Models\BsdEstadoLinea', 'bsd_estado_linea_id');
    }
    // public function getEstado_Linea(){
    //     switch($this->attributes['estado_linea']){
    //         case "P":
    //             return "Pendiente de Aprobación del Cliente";
    //         case "C":
    //             return "Créditos";
    //         case "A":
    //             return "Activo";
    //         case "R":
    //             return "Áreas";
    //         case "":
    //             return "";
    //         default:
    //             return "No existen valores";
    //     }
    // }
}
