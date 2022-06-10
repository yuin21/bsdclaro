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
        Schema::create('bsd_pago', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bsd_cuota_personal_id')->unsigned();
            $table->foreign('bsd_cuota_personal_id')
            ->references("id")
            ->on("bsd_cuota_personal");
            $table->bigInteger('bsd_venta_id')->unsigned();
            $table->foreign('bsd_venta_id')
            ->references("id")
            ->on("bsd_venta");            
            $table->float('porcentaje_comision');
            $table->float('comision_consultor');
            $table->char('estado_carpeta', 1)->comment('C or N'); 
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
        Schema::dropIfExists('bsd_pago');
    }
};
