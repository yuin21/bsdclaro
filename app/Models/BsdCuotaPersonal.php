<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdCuotaPersonal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'bsd_cuota_id',
        'bsd_personal_id',
        'mes',
        'año',
        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',
     ] ;

    protected $table='bsd_cuota_personal';

    public function personal(){
        return $this->belongsTo('App\Models\BsdPersonal', 'bsd_personal_id');
    }
    public function cuota(){
        return $this->belongsTo('App\Models\BsdCuota', 'bsd_cuota_id');
    }

}
