<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursals', function (Blueprint $table) {
            $table->bigIncrements('sucursal_id');
            $table->string('numero_sucursal');
            $table->text('imagen')->nullable();
            $table->string('nombre',60);
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('municipio_id');
            $table->unsignedBigInteger('localidad_id');
            $table->string('telefono',10)->nullable();
            $table->string('email');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('estado_id')->references('estado_id')->on('estados');
            $table->foreign('municipio_id')->references('municipio_id')->on('municipios');
            $table->foreign('localidad_id')->references('localidad_id')->on('localidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursals');
    }
}
