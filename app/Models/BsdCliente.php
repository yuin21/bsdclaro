<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdCliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'ruc',
        'razon_social',
        'num_celular',
        'direccion',
        'departamento',
        'provincia',
        'distrito',
        'tipo_cliente',
        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',       
     ] ;
        
    protected $table='bsd_cliente';
}