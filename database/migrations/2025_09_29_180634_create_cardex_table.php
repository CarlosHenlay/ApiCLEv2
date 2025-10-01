<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cardex', function (Blueprint $table) {
            $table->integer('car_Id')->autoIncrement(); // Solo ESTA columna auto_increment
            
            // Claves foráneas - SOLO integer normales
            $table->integer('alu_Id');
            $table->integer('ret_Id');
            
            // Columnas normales
            $table->integer('car_Cal');
            $table->string('car_Per', 12);
            $table->integer('car_An');
            $table->string('car_Acr', 1);
            $table->string('car_Obs', 30)->nullable();
            
            $table->timestamps();

            $table->foreign('alu_Id')->references('alu_Id')->on('alumnos')->onUpdate('cascade');
            $table->foreign('ret_Id')->references('ret_Id')->on('reticula')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cardex');
    }
};