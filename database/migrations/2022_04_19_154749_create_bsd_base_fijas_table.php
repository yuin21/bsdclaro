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
        Schema::create('bsd_base_fijas', function (Blueprint $table) {
            $table->id();
            $table->string('plataforma')->nullable();
            $table->string('ceco')->nullable();
            $table->string('codcliente')->nullable();
            $table->string('nomcliente')->nullable();
            $table->string('documento')->nullable();
            $table->string('num_docu')->nullable();
            $table->string('sec')->nullable();
            $table->string('linea')->nullable();
            $table->string('proyecto')->nullable();
            $table->string('ugis')->nullable();
            $table->string('sot')->nullable();
            $table->string('estadosot')->nullable();
            $table->string('solucion')->nullable();
            $table->string('promocion')->nullable();
            $table->string('campana')->nullable();
            $table->string('fecinstalacion')->nullable();
            $table->string('status_carpeta')->nullable();
            $table->string('cargo_fijo')->nullable();
            $table->string('semanapago')->nullable();
            $table->string('motivo_pago')->nullable();
            $table->string('factor')->nullable();
            $table->string('comision_a_recibir')->nullable();
            $table->string('comision_total')->nullable();
            $table->string('poliza')->nullable();
            $table->string('fecha_emision')->nullable();
            $table->string('vendedor')->nullable();
            $table->string('distrito')->nullable();
            $table->string('codplano')->nullable();
            $table->string('plano')->nullable();
            $table->string('usuarioregistro')->nullable();
            $table->string('ruc')->nullable();
            $table->string('campo02')->nullable();
            $table->string('campo03')->nullable();
            $table->string('campo04')->nullable();
            // $table->string('estado')->nullable();
            $table->string('usuarioreg')->nullable();
            $table->string('usuarioact')->nullable();
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
        Schema::dropIfExists('bsd_base_fijas');
    }
};
