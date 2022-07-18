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
        $procedure = "DROP PROCEDURE IF EXISTS `sp_contarServicios`;
        CREATE PROCEDURE `sp_contarServicios`(IN _id_servicio INT, IN _id_personal INT)
        BEGIN
        Select personal.nom_personal, servicio.nom_servicio, SUM(cf_con_igv) as sumcfconigv
        from bsd_detalle_venta as detalleventa join
        bsd_venta as venta join
        bsd_servicio as servicio join
        bsd_personal as personal
        where venta.id = detalleventa.bsd_venta_id and
        servicio.id = detalleventa.bsd_servicio_id and
        personal.id = venta.bsd_personal_id and
        detalleventa.bsd_servicio_id = _id_servicio and venta.bsd_personal_id = _id_personal
        GROUP BY servicio.nom_servicio;
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
