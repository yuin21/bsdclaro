<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdPersonal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_personal',
        'nom_personal' ,
        'ape_paterno' ,
        'ape_materno',
        'cargo' ,
        'tipo_doc_iden',
        'nro_doc_iden',
        'direccion',
        'celular',
        'email',
        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',       
     ] ;
        
    protected $table='bsd_personal';

    public function getPersonalFullNameAttribute()
    {
        return $this->attributes['nom_personal'] .' '. $this->attributes['ape_paterno'].' '. $this->attributes['ape_materno'];
    }
}