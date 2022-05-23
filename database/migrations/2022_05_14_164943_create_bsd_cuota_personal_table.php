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
        Schema::create('bsd_cuota_personal', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bsd_cuota_id')->unsigned();
            $table->foreign('bsd_cuota_id')
            ->references("id")
            ->on("bsd_cuota");
            $table->bigInteger('bsd_personal_id')->unsigned();
            $table->foreign('bsd_personal_id')
            ->references("id")
            ->on("bsd_personal");
            $table->string('mes', 10);
            $table->unique(['bsd_personal_id','mes','año']);
            $table->year('año');
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
        Schema::dropIfExists('bsd_cuota_personal');
    }
};
