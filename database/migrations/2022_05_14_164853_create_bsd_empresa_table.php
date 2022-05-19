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
        Schema::create('bsd_empresa', function (Blueprint $table) {
            $table->id();
            $table->char('ruc', 11)->unique();
            $table->string('razon_social', 120);
            $table->string('representante', 120);
            $table->string('direccion', 90)->nullable();
            $table->string('celular', 30)->nullable()->comment('Email y/o celular'); //No se si es obligatorio u opcional
            $table->string('email', 75)->unique()->nullable()->comment('Email y/o celular');//No se si es obligatorio u opcional
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
        Schema::dropIfExists('bsd_empresa');
    }
};
