<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdServicio extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'bsd_tipo_servicio_id',
        'nom_servicio',
        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',  
     ] ;

    protected $table='bsd_servicio';

    public function tiposervicio(){
        return $this->belongsTo('App\Models\BsdTipoServicio', 'bsd_tipo_servicio_id');
    }
}
