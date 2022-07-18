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

            $table->bigInteger('bsd_pago_id')->unsigned();
            $table->foreign('bsd_pago_id')
            ->references("id")
            ->on("bsd_pago");

            $table->bigInteger('bsd_venta_id')->unsigned();
            $table->foreign('bsd_venta_id')
            ->references("id")
            ->on("bsd_venta");

            $table->bigInteger('bsd_detalle_venta_id')->unsigned();
            $table->foreign('bsd_detalle_venta_id')
            ->references("id")
            ->on("bsd_detalle_venta");

            // $table->bigInteger('bsd_tipo_servicio_id')->unsigned();
            // $table->foreign('bsd_tipo_servicio_id')
            // ->references("id")
            // ->on("bsd_tipo_servicio");

            // $table->bigInteger('bsd_servicio_id')->unsigned();
            // $table->foreign('bsd_servicio_id')
            // ->references("id")
            // ->on("bsd_servicio");

            // $table->bigInteger('bsd_plan_id')->unsigned();
            // $table->foreign('bsd_plan_id')
            // ->references("id")
            // ->on("bsd_plan");

            $table->float('cuota');
            $table->float('comision_consultor');
            $table->float('sub_total');
            // $table->float('porcentaje_cump_dic');
            // $table->float('sum_total_ventas');
            // $table->float('sum_renta_total_ventas');
            // $table->float('sum_comision_bruta_dace');
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
