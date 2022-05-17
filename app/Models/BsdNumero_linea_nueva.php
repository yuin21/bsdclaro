<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdNumero_linea_nueva extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'bsd_detalle_venta_id' ,
        'numero_linea_nueva' ,
        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',       
     ] ;
        
    protected $table='bsd_numero_linea_nueva';

    public function detalle_venta(){
        return $this->belongsTo('App\Models\BsdDetalleVenta', 'bsd_detalle_venta_id');
    }
}
