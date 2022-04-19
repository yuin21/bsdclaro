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
        Schema::create('bsd_base_movils', function (Blueprint $table) {
            $table->id();
            $table->string('sec')->nullable();
            $table->string('fecha_operacion')->nullable();
            $table->string('tipo_operacion')->nullable();
            $table->string('cod_region')->nullable();
            $table->string('region')->nullable();
            $table->string('departamento')->nullable();
            $table->string('pdv')->nullable();
            $table->string('cod_pdv')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('cod_bscs')->nullable();
            $table->string('co_id')->nullable();
            $table->string('fec_activacion')->nullable();
            $table->string('linea')->nullable();
            $table->string('estado_linea')->nullable();
            $table->string('fec_estado')->nullable();
            $table->string('plan')->nullable();
            $table->string('servicio')->nullable();
            $table->string('cargo_fijo')->nullable();
            $table->string('cargo_real')->nullable();
            $table->string('factor')->nullable();
            $table->string('ruc_cliente')->nullable();
            $table->string('comision_base')->nullable();
            $table->string('fecha_pago')->nullable();
            $table->string('semana_pago')->nullable();
            $table->string('estado_exp')->nullable();
            $table->string('fuera_plazo')->nullable();
            $table->string('extorno_sivco')->nullable();
            $table->string('extorno_tope')->nullable();
            $table->string('comision_final')->nullable();
            $table->string('oc')->nullable();
            $table->string('observacion')->nullable();
            $table->string('fecha_carga')->nullable();
            $table->string('periodo')->nullable();
            $table->string('tipo_cliente')->nullable();
            $table->string('tipo_comision')->nullable();
            $table->string('tipo_ruc')->nullable();
            $table->string('tipo_distribuidor')->nullable();
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
        Schema::dropIfExists('bsd_base_movils');
    }
};
