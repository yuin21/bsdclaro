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
            $table->char('sec', 8)->nullable();
            $table->date('fecha_operacion')->nullable();
            $table->string('tipo_operacion', 25)->nullable();
            $table->char('cod_region', 2)->nullable();
            $table->string('region', 10)->nullable();
            $table->string('departamento', 25)->nullable();
            $table->string('pdv', 12)->nullable();
            $table->char('cod_pdv', 10)->nullable();
            $table->char('customer_id', 8)->nullable();
            $table->string('cod_bscs', 25)->nullable();
            $table->char('co_id', 8)->nullable();
            $table->date('fec_activacion')->nullable();
            $table->char('linea', 9)->nullable();
            $table->char('estado_linea', 1)->nullable();
            $table->date('fec_estado')->nullable();
            $table->string('plan', 50)->nullable();
            $table->string('servicio', 25)->nullable();
            $table->float('cargo_fijo')->nullable();
            $table->float('cargo_real')->nullable();
            $table->float('factor')->nullable();
            $table->char('ruc_cliente', 11)->nullable();
            $table->float('comision_base')->nullable();
            $table->char('fecha_pago', 10)->nullable();
            $table->char('semana_pago', 11)->nullable();
            $table->string('estado_exp', 20)->nullable();
            $table->char('fuera_plazo', 2)->nullable();
            $table->tinyInteger('extorno_sivco')->nullable();
            $table->tinyInteger('extorno_tope')->nullable();
            $table->float('comision_final')->nullable();
            $table->char('oc', 10)->nullable();
            $table->string('observacion', 300)->nullable();
            $table->char('fecha_carga', 10)->nullable();
            $table->char('periodo', 6)->nullable();
            $table->string('tipo_cliente', 20)->nullable();
            $table->string('tipo_comision', 20)->nullable();
            $table->string('tipo_ruc', 20)->nullable();
            $table->string('tipo_distribuidor', 20)->nullable();
            $table->boolean('estado')->default(1);
            $table->string('usuarioreg', 255)->nullable()->default('system');
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
        Schema::dropIfExists('bsd_base_movils');
    }
};
