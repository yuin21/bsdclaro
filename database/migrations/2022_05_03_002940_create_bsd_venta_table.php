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
        Schema::create('bsd_venta', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bsd_personal_id')->unsigned();
            $table->foreign('bsd_personal_id')
            ->references("id")
            ->on("bsd_personal");
            $table->bigInteger('bsd_cliente_id')->unsigned();
            $table->foreign('bsd_cliente_id')
            ->references("id")
            ->on("bsd_cliente");
            $table->timestamp('fecha_registro');
            $table->string('tipo_contrato', 20);
            $table->char('sec', 8);
            $table->string('observaciones', 300)->nullable();
            $table->timestamp('fecha_entrega_vpo')->nullable();
            $table->string('observaciones_vpo', 300)->nullable();
            $table->char('registrado_selforce', 1)->nullable()->comment('S or N');//No se si se registra en selforce despues o durante la venta
            $table->string('solicitud', 200)->nullable();
            $table->char('sot', 8)->nullable();
            $table->timestamp('fecha_entrega_bpo')->nullable();
            $table->char('conforme_bpo', 1)->nullable()->comment('C or N');
            $table->string('observaciones_bpo', 300)->nullable();
            $table->float('total');
            $table->char('estado_venta', 1)->default('A')->comment('A or N');
            $table->char('estado', 1)->default('A')->comment('A or D');
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
        Schema::dropIfExists('bsd_venta');
    }
};
