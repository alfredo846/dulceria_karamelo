<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->bigIncrements('detalle_venta_id');
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('articulo_id');
            $table->integer('cantidad_empaque');
            $table->integer('cantidad_unidad');
            $table->double('total',15,2);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('venta_id')->references('venta_id')->on('ventas');
            $table->foreign('articulo_id')->references('articulo_id')->on('articulos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
}
