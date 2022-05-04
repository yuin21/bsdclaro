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
        Schema::create('bsd_cuota', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_consultor', 20)->nullable()->comment('Relugar, Senior, ...');
            $table->string('tipo_venta', 20)->nullable()->comment('Movil, Fija, General ...');
            $table->string('personal', 120)->nullable()->comment('Erick, Giovanna, ...');
            $table->float('cantidad_cuota');
            $table->string('mes', 10);
            $table->year('año');
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
        Schema::dropIfExists('bsd_cuota');
    }
};
