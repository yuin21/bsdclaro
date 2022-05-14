<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('bsd_detalle_pago', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bsd_personal_id')->unsigned();
            $table->foreign('bsd_personal_id')
            ->references("id")
            ->on("bsd_personal");
            $table->bigInteger('bsd_pago_id')->unsigned();
            $table->foreign('bsd_pago_id')
            ->references("id")
            ->on("bsd_pago");
            $table->string('razon_social', 75);
            $table->char('ruc', 11);
            $table->timestamp('fecha_activado');
            $table->string('numero_linea_nueva', 13)->nullable();
            $table->char('estado_linea', 1);
            $table->string('plan_vendido', 150);
            $table->char('sec', 8);
            $table->string('nombre_servicio', 15);
            $table->string('tipo_servicio', 20);
            $table->float('cf_sin_igv');
            $table->float('factor');
            $table->float('comision_dace');
            $table->float('porcentaje_comision');
            $table->float('comision_consultor');
            $table->char('estado_carpeta', 1)->comment('C or N'); //No se si poner por defecto N, ya que no siempre se paga al registro y si se registra el pago se paga
            $table->char('pago_1er_recibo', 1)->comment('S or N');
            $table->char('pago_dace', 1)->comment('S or N');
            $table->char('abono_consultor', 1)->comment('S or N');
            $table->char('estado', 1)->default('1')->comment('1 or 0');
            $table->string('usuario_reg', 255)->default('system');
            $table->string('usuario_act', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bsd_detalle_pago');
    }
};
