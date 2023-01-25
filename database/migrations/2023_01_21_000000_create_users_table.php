<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',60);
            $table->string('apellido_paterno',60);
            $table->string('apellido_materno',60);
            $table->string('genero');
            $table->string('telefono',10);
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('foto');
            $table->unsignedBigInteger('rol_id');
            $table->unsignedBigInteger('sucursal_id')->nullable();
            $table->date('ultimo_login')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('rol_id')->references('rol_id')->on('rols');
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
        Schema::dropIfExists('users');
    }
}
