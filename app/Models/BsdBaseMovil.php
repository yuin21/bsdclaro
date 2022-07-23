<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdBaseMovil extends Model
{
    use HasFactory;


    protected $fillable= [
        'sec',
        'fecha_operacion',
        'tipo_operacion',
        'cod_region',
        'region',
        'departamento',
        'pdv',
        'cod_pdv',
        'customer_id',
        'cod_bscs',
        'co_id',
        'fec_activacion',
        'linea',
        'estado_linea',
        'fec_estado',
        'plan',
        'servicio',
        'cargo_fijo',
        'cargo_real',
        'factor',
        'ruc_cliente',
        'comision_base',
        'fecha_pago',
        'semana_pago',
        'estado_exp',
        'fuera_plazo',
        'extorno_sivco',
        'extorno_tope',
        'comision_final',
        'oc',
        'observacion',
        'fecha_carga',
        'periodo',
        'tipo_cliente',
        'tipo_comision',
        'tipo_ruc',
        'tipo_distribuidor'];
}
