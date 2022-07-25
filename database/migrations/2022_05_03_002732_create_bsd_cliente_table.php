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
        Schema::create('bsd_cliente', function (Blueprint $table) {
            $table->id();
            $table->char('ruc', 11)->unique();
            $table->string('razon_social', 120);
            $table->string('num_celular', 30)->nullable()->comment('999999999 or +51 999999999'); //No se si ponerle unico
            $table->string('direccion', 300)->nullable();
            $table->string('departamento', 25)->nullable();
            $table->string('provincia', 40)->nullable();
            $table->string('distrito', 50)->nullable();
            $table->string('tipo_cliente', 30)->nullable();
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
        Schema::dropIfExists('bsd_cliente');
    }
};
