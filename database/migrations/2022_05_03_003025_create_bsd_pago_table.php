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
        Schema::create('bsd_pago', function (Blueprint $table) {
            $table->id();
            $table->integer('alta')->nullable();
            $table->integer('porta')->nullable();
            $table->integer('renovacion')->nullable();
            $table->integer('total_ventas')->nullable();
            $table->float('renta_reno')->nullable();
            $table->float('renta_total_ventas')->nullable();
            $table->float('comision_bruta_dace_movil')->nullable();
            $table->float('comision_neta_dace_movil')->nullable();
            $table->float('comision_consultor_reno')->nullable();
            $table->float('comision_consultor_ventas')->nullable();
            $table->integer('ifi')->nullable();
            $table->integer('hfc')->nullable();
            $table->integer('fibra')->nullable();
            $table->integer('ftth')->nullable();
            $table->integer('olo')->nullable();
            $table->integer('total_fijas')->nullable();
            $table->float('renta_total')->nullable();
            $table->float('comision_bruta_dace_fija')->nullable();
            $table->float('comision_neta_dace_fija')->nullable();
            $table->float('comision_consultor_fijas')->nullable();
            $table->bigInteger('bsd_cuota_id')->unsigned();
            $table->foreign('bsd_cuota_id')
            ->references("id")
            ->on("bsd_cuota");
            $table->string('tipo_pago', 10)->nullable()->comment('Planilla or Libre');
            $table->float('sub_total')->nullable();
            $table->float('por_cump_dic')->nullable();
            $table->float('total')->nullable();
            $table->float('por_cuota')->nullable();
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
        Schema::dropIfExists('bsd_pago');
    }
};
