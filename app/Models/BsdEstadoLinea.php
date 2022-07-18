<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdEstadoLinea extends Model
{
    use HasFactory; 
    protected $fillable = [
        'id',
        'bsd_tipo_servicio_id',
        'nombre_estado_linea'      
     ] ;
     protected $table='bsd_estado_linea';

     public function tiposervicio(){
        return $this->belongsTo('App\Models\BsdTipoServicio', 'bsd_tipo_servicio_id');
    }
}
