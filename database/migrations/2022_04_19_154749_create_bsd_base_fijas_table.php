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
            $table->string('plataforma', 10)->nullable();
            $table->char('ceco', 10)->nullable();
            $table->bigInteger('codcliente')->nullable();
            $table->string('nomcliente', 120)->nullable();
            $table->string('documento', 25)->nullable();
            $table->char('num_docu', 11)->nullable();
            $table->char('sec', 8)->nullable();
            $table->string('linea', 13)->nullable();
            $table->string('proyecto', 45)->nullable();
            $table->smallInteger('ugis')->nullable();
            $table->char('sot', 8)->nullable();
            $table->string('estadosot', 20)->nullable();
            $table->string('solucion', 120)->nullable();
            $table->string('promocion', 120)->nullable();
            $table->string('campana', 200)->nullable(); //No se que es esto
            $table->char('fecinstalacion', 8)->nullable();
            $table->string('status_carpeta', 25)->nullable();
            $table->float('cargo_fijo')->nullable();
            $table->char('semanapago', 11)->nullable();
            $table->string('motivo_pago', 20)->nullable(); //Solo existe un campo nulo
            $table->float('factor')->nullable();
            $table->float('comision_a_recibir')->nullable();
            $table->float('comision_total')->nullable();
            $table->char('poliza', 10)->nullable();
            $table->char('fecha_emision', 8)->nullable();
            $table->string('vendedor', 20)->nullable();
            $table->string('distrito', 50)->nullable();
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
