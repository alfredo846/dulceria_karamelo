<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->bigIncrements('articulo_id');
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('sucursal_id');
            $table->decimal('precio_compra',5,2);
            $table->decimal('precio_venta',5,2);
            $table->integer('stock_minimo');
            $table->integer('stock_maximo');
            $table->integer('stock_empaque');
            $table->integer('stock_unidad');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('producto_id')->references('producto_id')->on('productos');
            $table->foreign('sucursal_id')->references('sucursal_id')->on('sucursals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
