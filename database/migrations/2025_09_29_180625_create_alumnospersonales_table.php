<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('alumnospersonales', function (Blueprint $table) {
            $table->integer('aluPer_Id')->autoIncrement(); // Solo ESTA columna auto_increment
            
            // Claves foráneas - SOLO integer normales
            $table->integer('alu_Id');
            $table->integer('min_Id');
            $table->integer('est_Id');
            
            // Columnas normales
            $table->string('aluPer_TelPer', 15)->nullable();
            $table->string('aluPer_TelCasa', 15)->nullable();
            $table->string('aluPer_Correo', 30)->nullable();
            $table->string('aluPer_CalleNum', 30);
            $table->string('aluPer_Col', 30);
            $table->string('aluPer_Loc', 30);
            $table->string('aluPer_TipSan', 15)->nullable();
            $table->date('aluPer_FechNac');
            $table->string('aluPer_NomTut', 50)->nullable();
            $table->string('aluPer_TelTut', 15)->nullable();
            
            $table->timestamps();

            $table->foreign('alu_Id')->references('alu_Id')->on('alumnos')->onUpdate('cascade');
            $table->foreign('min_Id')->references('mun_id')->on('municipios')->onUpdate('cascade');
            $table->foreign('est_Id')->references('est_id')->on('estados')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumnospersonales');
    }
};