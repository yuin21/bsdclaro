<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdBaseFija extends Model
{
    use HasFactory;

    protected $fillable = [
        'plataforma',
        'ceco',
        'codcliente',
        'nomcliente',
        'documento',
        'num_docu',
        'sec',
        'linea',
        'proyecto',
        'ugis',
        'sot',
        'estadosot',
        'solucion',
        'promocion',
        'campana',
        'fecinstalacion',
        'status_carpeta',
        'cargo_fijo',
        'semanapago',
        'motivo_pago',
        'factor',
        'comision_a_recibir',
        'comision_total',
        'poliza',
        'fecha_emision',
        'vendedor',
        'distrito',
        'codplano',
        'plano',
        'usuarioregistro',
        'ruc',
        'campo02',
        'campo03',
        'campo04'];
}
