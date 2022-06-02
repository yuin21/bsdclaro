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
            $table->char('tipo_contrato', 1)->comment('F (Fisico) or V (Virtual)');
            $table->char('sec', 8); //Esta en Detalle_Pago
            //valores nuevos agregados desde aca
            $table->string('nro_oportunidad',18);
            $table->smallInteger('nivel_venta');
            $table->char('nro_proyecto', 10)->nullable();
            $table->date('fecha_conforme')->nullable();
            $table->date('fecha_envio')->nullable();
            //Hasta aqui
            //$table->char('tipo_entrega_vpo_bpo',1)->nullable()->comment('V or B');;
            $table->string('observacion', 250)->nullable();
            $table->date('fecha_entrega')->nullable();
            //$table->string('observaciones_te', 300)->nullable();
            $table->char('salesforce', 1)->comment('S (Si) or N (No)');//No se si se registra en selforce despues o durante la venta
            //$table->string('solicitud', 200)->nullable();
            $table->char('sot', 8)->nullable();
            //$table->char('estado_te', 1)->nullable()->comment('C or N');
            $table->float('total');
            $table->char('estado_venta', 1)->default('P')->comment('P (Pendiente), E (Enviado), C (Conforme), N (No conforme)');
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
