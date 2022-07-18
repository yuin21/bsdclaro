<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS `sp_ventas_rpt`;
        CREATE PROCEDURE `sp_ventas_rpt`(IN fecha_ini text, IN fecha_fin text)
            BEGIN
	        CREATE TEMPORARY TABLE IF NOT EXISTS temp_ventas_activadas (
	            CONSULTORES varchar(86)not NULL,
	            RENO INTEGER(3) not null,
	            CON_IGV double(11,2) not null,
	            SIN_IGV double(11,2) not null,
	            ALTA INTEGER(3) not null,
	            PORTA INTEGER(3) not null,
	            N_LINEAS INTEGER(3) not null,
	            CON_IGV_MOVILES double(11,2) not null,
	            SIN_IGV_MOVILES double(11,2) not null
	        );
            insert into  temp_ventas_activadas (
	        CONSULTORES,
	        RENO,
	        CON_IGV,
	        SIN_IGV,
	        ALTA,
	        PORTA,
	        N_LINEAS,
	        CON_IGV_MOVILES,
	        SIN_IGV_MOVILES
	        )
	        select concat(p.nom_personal, ' ', p.ape_paterno) as consultor
	        , ifnull(contar_servicio(concat(p.nom_personal, ' ', p.ape_paterno),'Renovacion',fecha_ini,fecha_fin),0) as total_reno
	        , ifnull(contar_cargo_con_igv(concat(p.nom_personal, ' ', p.ape_paterno),'Renovacion','',fecha_ini,fecha_fin),0) as total_con_igv_reno
	        , ifnull(contar_cargo_sin_igv(concat(p.nom_personal, ' ', p.ape_paterno),'Renovacion','',fecha_ini,fecha_fin),0) as total_sin_igv_reno
	        , ifnull(contar_servicio(concat(p.nom_personal, ' ', p.ape_paterno),'Alta',fecha_ini,fecha_fin),0) as total_alta
	        , ifnull(contar_servicio(concat(p.nom_personal, ' ', p.ape_paterno),'Portabilidad',fecha_ini,fecha_fin),0) as total_porta
	        , ifnull(total_nro_linea(contar_servicio(concat(p.nom_personal, ' ', p.ape_paterno),'Alta',fecha_ini,fecha_fin),
	        contar_servicio(concat(p.nom_personal, ' ', p.ape_paterno),'Portabilidad',fecha_ini,fecha_fin)),0) as total_nro_linea
	        , ifnull(contar_cargo_con_igv(concat(p.nom_personal, ' ', p.ape_paterno),'Alta','Portabilidad',fecha_ini,fecha_fin),0) as total_con_igv_alta_porta
	        , ifnull(contar_cargo_sin_igv(concat(p.nom_personal, ' ', p.ape_paterno),'Alta','Portabilidad',fecha_ini,fecha_fin),0) as total_sin_igv_alta_porta
	        from bsd_personal as p
	        inner join bsd_venta as v on v.bsd_personal_id = p.id
	        inner join bsd_detalle_venta as dv on dv.bsd_venta_id = v.id
	        inner join bsd_servicio as s on s.id = dv.bsd_servicio_id
	        group by consultor;
	        select * from temp_ventas_activadas;
            drop table temp_ventas_activadas;
            END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
