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
        Schema::create('bsd_detalle_venta', function (Blueprint $table) {            
            $table->id();
            $table->bigInteger('bsd_venta_id')->unsigned();
            $table->foreign('bsd_venta_id')
            ->references("id")
            ->on("bsd_venta");
            $table->bigInteger('bsd_plan_id')->unsigned();
            $table->foreign('bsd_plan_id')
            ->references("id")
            ->on("bsd_plan");
            $table->bigInteger('bsd_servicio_id')->unsigned();
            $table->foreign('bsd_servicio_id')
            ->references("id")
            ->on("bsd_servicio");
            $table->bigInteger('bsd_tipo_servicio_id')->unsigned();
            $table->foreign('bsd_tipo_servicio_id')
            ->references("id")
            ->on("bsd_tipo_servicio");
            $table->smallInteger('cantidad');
            $table->float('precio_plan');
            $table->float('cf_con_igv');
            $table->float('cf_sin_igv');
            $table->string('equipo_producto', 30)->nullable();
            $table->string('operador', 20)->nullable();
            $table->char('estado_linea', 1)->nullable()->comment('A or D'); //Entiendo que el estado es desactivado por defecto, pero cuando se registra la fecha de activado, este cambia a activado
            $table->timestamp('fecha_activado')->nullable();
            $table->timestamp('fecha_liquidado')->nullable();
            $table->float('status_100_por')->nullable(); //Este en un campo que varia con el tiempo, no se si puede empezar con 0% por lo cuál mejor lo dejo nulo
            $table->string('numero_proyecto', 45)->nullable();
            $table->timestamp('fecha_instalacion')->nullable(); //No estoy seguro si primero se registra y luego pactan la fecha de instalación o eso se pacta en el registro
            $table->time('hora')->nullable(); //Lo mismo que arriba
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
        Schema::dropIfExists('bsd_detalle_venta');
    }
};
