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
            $table->string('sec')->nullable();
            $table->string('expediente')->nullable();
            $table->string('codigo_cliente')->nullable();
            $table->string('cod_bscs')->nullable();
            $table->string('cliente')->nullable();
            $table->string('dni_ruc')->nullable();
            $table->string('linea')->nullable();
            $table->string('plazo_acuerdo')->nullable();
            $table->string('pdv')->nullable();
            $table->string('cod_contrato')->nullable();
            $table->string('fecha_renovacion')->nullable();
            $table->string('liquidacion')->nullable();
            $table->string('plan')->nullable();
            $table->string('aaservicio')->nullable();
            $table->string('estado_servicio')->nullable();
            $table->string('cf')->nullable();
            $table->string('factor_renovacion')->nullable();
            $table->string('semana_pago')->nullable();
            $table->string('fecha_pago')->nullable();
            $table->string('extorno_topes')->nullable();
            $table->string('extorno_sivco')->nullable();
            $table->string('comision')->nullable();
            $table->string('oc')->nullable();
            $table->string('nota')->nullable();
            $table->string('segmento')->nullable();
            // $table->string('estado')->nullable();
            $table->string('usuarioreg')->nullable();
            $table->string('fechareg')->nullable();
            $table->string('usuarioact')->nullable();
            $table->string('fechaact')->nullable();
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
