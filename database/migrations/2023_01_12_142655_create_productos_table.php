<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('producto_id');
            $table->string('codigo_barras',14);
            $table->string('nombre',60);
            $table->string('descripcion',60);
            $table->text('imagen')->nullable();
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('temporada_id');
            $table->unsignedBigInteger('empaque_id');
            $table->integer('piezas_por_empaque');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('categoria_id')->references('categoria_id')->on('categorias');
            $table->foreign('marca_id')->references('marca_id')->on('marcas');
            $table->foreign('temporada_id')->references('temporada_id')->on('temporadas');
            $table->foreign('empaque_id')->references('empaque_id')->on('empaques');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
