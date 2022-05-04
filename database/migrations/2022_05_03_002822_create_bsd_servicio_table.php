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
        Schema::create('bsd_servicio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_servicio', 15)->comment('Movil o Fija');
            $table->string('tipo_servicio', 20)->comment('Alta, Porta, HFC, ...');
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
        Schema::dropIfExists('bsd_servicio');
    }
};
