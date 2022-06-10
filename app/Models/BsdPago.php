<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdPago extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'bsd_cuota_personal_id',
        'bsd_venta_id',
        'porcentaje_comision',
        'comision_consultor',
        'estado_carpeta',
        'pago_1er_recibo',
        'pago_dace',
        'abono_consultor',

        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',  
     ] ;
     

    protected $table='bsd_pago';

    public function cuotapersonal(){
        return $this->belongsTo('App\Models\BsdCuotaPersonal', 'bsd_cuota_personal_id');
    }

    public function venta(){
        return $this->belongsTo('App\Models\BsdVenta', 'bsd_venta_id');
    }

}
