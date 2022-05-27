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
            $table->timestamp('fecha_registro')->useCurrent();;
            $table->string('tipo_contrato', 20);
            $table->char('sec', 8); //Esta en Detalle_Pago 
            $table->char('tipo_entrega_vpo_bpo',1)->nullable()->comment('V or B');;
            $table->string('observaciones', 300)->nullable();
            $table->timestamp('fecha_entrega_te')->nullable();
            $table->string('observaciones_te', 300)->nullable();
            $table->char('registrado_selforce', 1)->default('S')->comment('S or N');//No se si se registra en selforce despues o durante la venta
            $table->string('solicitud', 200)->nullable();
            $table->char('sot', 8)->nullable();
            $table->char('estado_te', 1)->nullable()->comment('C or N');
            $table->float('total');
            $table->char('estado_venta', 1)->default('A')->comment('A or N');
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
        Schema::dropIfExists('bsd_venta');
    }
};
