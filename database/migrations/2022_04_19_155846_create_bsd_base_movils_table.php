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
            $table->char('sec', 8);
            $table->date('fecha_operacion');
            $table->string('tipo_operacion', 35);
            $table->char('cod_region', 2);
            $table->string('region', 10);
            $table->string('departamento', 25);
            $table->string('pdv', 20);
            $table->char('cod_pdv', 10);
            $table->bigInteger('customer_id');
            $table->string('cod_bscs', 35); //No estoy seguro de que hace referencia esto
            $table->bigInteger('co_id');
            $table->date('fec_activacion')->nullable();
            $table->string('linea', 13)->nullable();
            $table->char('estado_linea', 1)->default('d');
            $table->date('fec_estado')->nullable();
            $table->string('plan', 45);
            $table->string('servicio', 25);
            $table->float('cargo_fijo');
            $table->float('cargo_real');
            $table->float('factor');
            $table->char('ruc_cliente', 11);
            $table->float('comision_base');
            $table->date('fecha_pago');
            $table->char('semana_pago', 11);
            $table->string('estado_exp', 20);
            $table->char('fuera_plazo', 2);
            $table->float('extorno_sivco')->default(0);
            $table->float('extorno_tope')->default(0);
            $table->float('comision_final');
            $table->char('oc', 10);
            $table->string('observacion', 300)->nullable();
            $table->date('fecha_carga')->nullable();
            $table->char('periodo', 6)->nullable();
            $table->string('tipo_cliente', 30)->nullable();
            $table->string('tipo_comision', 25)->nullable();
            $table->string('tipo_ruc', 25)->nullable();
            $table->string('tipo_distribuidor', 20)->nullable();
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
        Schema::dropIfExists('bsd_base_movils');
    }
};
