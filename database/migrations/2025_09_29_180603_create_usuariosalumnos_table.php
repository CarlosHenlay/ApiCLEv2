<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('usuariosalumnos', function (Blueprint $table) {
            $table->integer('usuAlu_Id')->autoIncrement(); // Solo esta columna auto_increment
            $table->string('usuAlu_Nom', 60);
            $table->string('usuAlu_Pas', 30);
            $table->integer('dom_Id'); // ← QUITAR autoIncrement() de aquí
            $table->timestamps();

            $table->foreign('dom_Id')->references('dom_Id')->on('dominios')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuariosalumnos');
    }
};