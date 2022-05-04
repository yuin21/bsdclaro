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
            $table->string('plataforma', 10);
            $table->char('ceco', 10);
            $table->bigInteger('codcliente');
            $table->string('nomcliente', 120);
            $table->string('documento', 25);
            $table->char('num_docu', 11);
            $table->char('sec', 8);
            $table->string('linea', 13)->nullable();
            $table->string('proyecto', 45)->nullable();
            $table->smallInteger('ugis');
            $table->char('sot', 8)->nullable();
            $table->string('estadosot', 20);
            $table->string('solucion', 120)->nullable();
            $table->string('promocion', 120)->nullable();
            $table->string('campana', 200)->nullable(); //No se que es esto
            $table->char('fecinstalacion', 8)->nullable();
            $table->string('status_carpeta', 25);
            $table->float('cargo_fijo');
            $table->char('semanapago', 11);
            $table->string('motivo_pago', 20);
            $table->float('factor');
            $table->float('comision_a_recibir');
            $table->float('comision_total');
            $table->char('poliza', 10)->nullable();
            $table->char('fecha_emision', 8);
            $table->string('vendedor', 20);
            $table->string('distrito', 50);
            $table->string('codplano', 20)->nullable();
            $table->string('plano', 50)->nullable();
            $table->string('usuarioregistro', 20)->nullable();
            $table->char('ruc', 11)->nullable();
            $table->string('campo02', 20)->nullable();
            $table->string('campo03', 20)->nullable();
            $table->string('campo04', 20)->nullable();
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
        Schema::dropIfExists('bsd_base_fijas');
    }
};
