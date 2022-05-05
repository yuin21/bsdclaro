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
        Schema::create('bsd_plan_telefonia', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bsd_servicio_id')->unsigned();
            $table->foreign('bsd_servicio_id')
            ->references("id")
            ->on("bsd_servicio");
            $table->string('nombre_plan', 120)->comment('Ejem: INTERNET 100 MBPS + TELEFONIA 100');
            $table->float('precio_unitario');
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
        Schema::dropIfExists('bsd_plan_telefonia');
    }
};
