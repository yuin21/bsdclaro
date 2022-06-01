<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdVenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'bsd_personal_id',
        'bsd_cliente_id',
        'fecha_registro',
        'tipo_contrato',
        'observacion',
        'fecha_entrega',
        'salesforce',
        'sot',
        'sec',
        'total',
        'estado_venta',
        'nro_oportunidad',
        'nivel_venta',
        'nro_proyecto',
        'fecha_conforme',
        'fecha_envio'
        
        // 'estado_venta',
        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',  
     ] ;
     

    protected $table='bsd_venta';

    public function cliente(){
        return $this->belongsTo('App\Models\BsdCliente', 'bsd_cliente_id');
    }

    public function personal(){
        return $this->belongsTo('App\Models\BsdPersonal', 'bsd_personal_id');
    }

    public function detallesventa(){
        return $this->hasMany('App\Models\BsdDetalleVenta');
    }

    public function getEstado_Venta(){
        switch($this->attributes['estado_venta']){
            case "P":
                return "Pendiente";
            case "E":
                return "Enviado";
            case "C":
                return "Conforme";
            case "N":
                return "No Conforme";
            default:
                return "No existen valores";
        }
    }
    
    public function getFechaEntrega(){
        $fecha_entrega = $this->fecha_entrega;
        $fecha = substr($fecha_entrega, 0, -9); 
        return $fecha;
    }
}
