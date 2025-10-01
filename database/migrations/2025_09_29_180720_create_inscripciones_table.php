<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->integer('ins_Id')->autoIncrement(); // Solo ESTA columna auto_increment
            
            // Clave foránea - SOLO integer normal
            $table->integer('gru_Id');
            
            // Columnas normales
            $table->string('ins_Ctr', 12);
            $table->date('ins_Fech');
            $table->string('ins_Rec', 15);
            $table->decimal('ins_Mon', 6, 0);
            $table->string('ins_Per', 12);
            $table->integer('ins_An'); // ← Columna normal
            $table->integer('ins_P1'); // ← Columna normal
            $table->integer('ins_P2'); // ← Columna normal
            $table->integer('ins_P3'); // ← Columna normal
            $table->integer('ins_P4'); // ← Columna normal
            $table->integer('ins_PF'); // ← Columna normal
            $table->string('ins_Obs', 30)->nullable();
            
            $table->timestamps();

            $table->foreign('gru_Id')->references('gru_Id')->on('grupos')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
};