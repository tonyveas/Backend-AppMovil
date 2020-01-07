<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->bigIncrements('id_mascota');
            $table->string('nombre');
            $table->char('genero');
            $table->string('descripcion');
            $table->string('edad');
            $table->integer('estado');
            $table->bigInteger('dueno')->unsigned();
            $table->bigInteger('raza')->unsigned();
            $table->bigInteger('tipo')->unsigned();
            $table->timestamps();

            $table->foreign('dueno')
            ->references('id_usuario')->on('usuarios')
            ->onDelete('cascade')
            ->onUpdate('cascade');


            $table->foreign('raza')
            ->references('id_raza')->on('raza_mascotas')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('tipo')
            ->references('id_tipo_mascota')->on('tipo_mascotas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
}
