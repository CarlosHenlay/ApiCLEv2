<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->integer('usu_Id')->autoIncrement(); // ← Solo PRIMARY KEY aquí
            $table->string('usu_Nom', 60);
            $table->string('usu_Pas', 30);
            $table->string('usu_Clas', 15);
            $table->integer('dom_Id'); // ← Solo integer normal, SIN autoIncrement()
            $table->timestamps();

            $table->foreign('dom_Id')->references('dom_Id')->on('dominios')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};