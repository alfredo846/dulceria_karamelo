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
            $table->string('codigo_empaque',14);
            $table->string('codigo_pieza',14)->nullable();
            $table->string('nombre',60);
            $table->string('descripcion',60);
            $table->text('imagen')->nullable();
            $table->integer('categoria_id');
            $table->integer('marca_id');
            $table->integer('temporada_id');
            $table->integer('empaque_id');
            $table->integer('piezas_por_empaque');
            $table->softDeletes();
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
        Schema::dropIfExists('productos');
    }
}
