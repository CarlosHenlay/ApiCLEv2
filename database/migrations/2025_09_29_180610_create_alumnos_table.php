<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->integer('alu_Id')->autoIncrement(); // Solo ESTA columna auto_increment
            
            // Columnas normales
            $table->string('alu_NumCtr', 12);
            $table->string('alu_Curp', 20)->nullable();
            $table->string('alu_Nom', 20);
            $table->string('alu_AppPat', 20);
            $table->string('alu_AppMat', 20)->nullable();
            $table->string('alu_Sexo', 1)->nullable();
            
            // Claves foráneas - SOLO integer normales
            $table->integer('pla_Id');
            $table->integer('tab_Id');
            $table->integer('usuAlu_Id');
            
            // Columnas normales
            $table->string('alu_Sta', 1);
            $table->integer('alu_Sem');
            $table->string('alu_IngPer', 12);
            $table->integer('alu_IngAn');
            $table->string('alu_Ins', 1);
            $table->string('alu_FinPer', 12)->nullable();
            $table->integer('alu_finAn')->nullable();
            $table->string('alu_MotBaja', 40)->nullable();
            $table->string('alu_PerBaja', 12)->nullable();
            $table->integer('alu_AnBaja')->nullable();
            
            $table->timestamps();

            $table->unique('alu_NumCtr');
            $table->foreign('pla_Id')->references('pla_Id')->on('planestudios')->onUpdate('cascade');
            $table->foreign('tab_Id')->references('tab_Id')->on('tabuladorpagos')->onUpdate('cascade');
            $table->foreign('usuAlu_Id')->references('usuAlu_Id')->on('usuariosalumnos')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
};