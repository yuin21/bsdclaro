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
        Schema::create('bsd_numero_linea_nueva', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bsd_venta_id')->unsigned();
            $table->foreign('bsd_venta_id')
            ->references("id")
            ->on("bsd_venta");
            $table->string('numero_linea_nueva', 13);
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
        Schema::dropIfExists('bsd_numero_linea_nueva');
    }
};
