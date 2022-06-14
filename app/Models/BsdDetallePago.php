<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdDetallePago extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'bsd_pago_id',
        'bsd_venta_id',
        'bsd_detalle_venta_id',
        //'bsd_tipo_servicio_id',
        //'bsd_servicio_id',
        //'bsd_plan_id',
        'cuota',
        'comision_consultor',
        'sub_total',
        //'porcentaje_cump_dic',
        //'sum_total_ventas',
        //'sum_renta_total_ventas',
        //'sum_comision_bruta_dace',

        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',  
     ] ;
     

    protected $table='bsd_detalle_venta';

    public function pago(){
        return $this->belongsTo('App\Models\BsdPago', 'bsd_pago_id');
    }

    public function venta(){
        return $this->belongsTo('App\Models\BsdVenta', 'bsd_venta_id');
    }

    public function detalleventa(){
        return $this->belongsTo('App\Models\BsdDetalleVenta', 'bsd_detalle_venta_id');
    }

    public function tiposervicio(){
        return $this->belongsTo('App\Models\BsdTipoServicio', 'bsd_tipo_servicio_id');
    }

    public function servicio(){
        return $this->belongsTo('App\Models\BsdServicio', 'bsd_servicio_id');
    }

    public function plan(){
        return $this->belongsTo('App\Models\BsdPlan', 'bsd_plan_id');
    }
}
