<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdEmpresa extends Model
{
    use HasFactory;
    protected $fillable = [
        'ruc',
        'razon_social' ,
        'representante' ,
        'direccion',
        'celular' ,
        'email',
        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',       
     ] ;
        
     protected $table='bsd_empresa';
}
