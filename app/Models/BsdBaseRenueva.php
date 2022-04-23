<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdBaseRenueva extends Model
{
    use HasFactory;

    protected $fillable= [
        'sec',
        'expediente',
        'codigo_cliente',
        'cod_bscs',
        'cliente',
        'dni_ruc',
        'linea',
        'plazo_acuerdo',
        'pdv',
        'cod_contrato',
        'fecha_renovacion',
        'liquidacion',
        'plan',
        'aaservicio',
        'estado_servicio',
        'cf',
        'factor_renovacion',
        'semana_pago',
        'fecha_pago',
        'extorno_topes',
        'extorno_sivco',
        'comision',
        'oc',
        'nota',
        'segmento'];
}
