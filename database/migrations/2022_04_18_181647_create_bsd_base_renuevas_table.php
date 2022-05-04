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
        Schema::create('bsd_base_renuevas', function (Blueprint $table) {
            $table->id();
            $table->char('sec', 8);
            $table->string('expediente')->nullable();
            $table->bigInteger('codigo_cliente');
            $table->string('cod_bscs', 35);
            $table->string('cliente', 120);
            $table->string('dni_ruc', 11);
            $table->string('linea', 13)->nullable();
            $table->string('plazo_acuerdo', 75)->nullable();
            $table->string('pdv', 20)->nullable();
            $table->integer('cod_contrato');
            $table->char('fecha_renovacion', 8);
            $table->string('liquidacion', 30)->nullable();
            $table->string('plan', 45);
            $table->string('aaservicio', 25);
            $table->char('estado_servicio', 1);
            $table->float('cf');
            $table->float('factor_renovacion');
            $table->char('semana_pago', 11);
            $table->char('fecha_pago', 8);
            $table->float('extorno_topes')->default(0);
            $table->float('extorno_sivco')->default(0);
            $table->float('comision');
            $table->bigInteger('oc');
            $table->string('nota', 300)->nullable();
            $table->string('segmento', 20)->nullable();
            $table->char('estado', 1)->default('A')->comment('A or D');
            $table->string('usuarioreg', 255)->default('system');
            $table->string('usuarioact', 255)->nullable();
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
        Schema::dropIfExists('bsd_base_renuevas');
    }
};
