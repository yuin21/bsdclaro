<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdProductoTelefonia extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'bsd_servicio_id',
        'producto',
        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',
     ] ;

    protected $table='bsd_producto_telefonia';

    public function servicio(){
        return $this->belongsTo('App\Models\BsdServicio', 'bsd_servicio_id');
    }
}
