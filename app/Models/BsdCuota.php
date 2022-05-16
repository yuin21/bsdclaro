<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdCuota extends Model
{
    use HasFactory;
    protected $fillable = [
        'cuota',
        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',
     ] ;

    protected $table='bsd_cuota';

    
}
