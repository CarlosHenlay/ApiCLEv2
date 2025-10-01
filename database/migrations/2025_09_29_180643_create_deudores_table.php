<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('deudores', function (Blueprint $table) {
            $table->integer('deu_Id')->autoIncrement(); // Solo ESTA columna auto_increment
            
            // Clave foránea - SOLO integer normal
            $table->integer('alu_Id');
            
            // Columnas normales
            $table->string('deu_Con', 80);
            $table->date('deu_Fech');
            $table->string('deu_Per', 12);
            $table->integer('deu_An'); // ← Columna normal, SIN autoIncrement
            $table->string('deu_Obs', 30)->nullable();
            
            $table->timestamps();

            $table->foreign('alu_Id')->references('alu_Id')->on('alumnos')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('deudores');
    }
};