<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localidads', function (Blueprint $table) {
            $table->bigIncrements('localidad_id');
            $table->unsignedBigInteger('municipio_id');
            $table->string('nombre');
            $table->foreign('municipio_id')->references('municipio_id')->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localidads');
    }
}
