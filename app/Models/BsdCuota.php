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
        //'usuario_reg' ,
        //'usuario_act' ,
        // 'created_at',
        // 'updated_at',
     ] ;

    protected $table='bsd_cuota';

    //public function setUsuario_reg($usuario_reg){
    //    $this->usuario_reg = $usuario_reg;
    //}

    public function getCuotaRoundAttribute()
    {   
        $cuota = $this->attributes['cuota'];
        $coutaRound = number_format($cuota, 2);
        return $coutaRound;
    }
    
}
