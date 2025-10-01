<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('historicopagos', function (Blueprint $table) {
            $table->integer('hisPa_Id')->autoIncrement(); // Solo ESTA columna auto_increment
            
            // Claves foráneas - SOLO integer normales
            $table->integer('alu_Id');
            $table->integer('ret_Id');
            
            // Columnas normales
            $table->date('hisPa_Fech');
            $table->string('hisPa_Rec', 15);
            $table->decimal('hisPa_Mon', 6, 0);
            $table->string('hisPa_Per', 12);
            $table->integer('hisPa_An'); // ← Columna normal, SIN autoIncrement
            
            $table->timestamps();

            $table->foreign('alu_Id')->references('alu_Id')->on('alumnos')->onUpdate('cascade');
            $table->foreign('ret_Id')->references('ret_Id')->on('reticula')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('historicopagos');
    }
};