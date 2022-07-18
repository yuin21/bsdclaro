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
        Schema::create('bsd_personal', function (Blueprint $table) {
            $table->id();
            $table->string('nom_personal', 60);
            $table->string('ape_paterno', 25);
            $table->string('ape_materno', 25)->nullable();
            $table->string('usuario_sisact', 50)->nullable();
            $table->string('cargo', 75);
            $table->string('tipo_personal', 15)->nullable();
            $table->string('tipo_doc_iden', 30);
            $table->string('nro_doc_iden', 15)->unique();
            $table->string('direccion', 300)->nullable();
            $table->string('celular', 30)->nullable()->comment('Email y/o celular'); //No se si es obligatorio u opcional
            $table->string('email', 75)->unique()->comment('Email y/o celular');//No se si es obligatorio u opcional
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
        Schema::dropIfExists('bsd_personal');
    }
};
