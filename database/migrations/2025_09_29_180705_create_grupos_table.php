<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->integer('gru_Id')->autoIncrement(); // Solo ESTA columna auto_increment
            
            // Claves foráneas - SOLO integer normales
            $table->integer('ret_Id');
            $table->integer('doc_Id');
            
            // Columnas normales
            $table->string('gru_Cgr', 5);
            $table->integer('gru_Lim'); // ← Columna normal
            $table->integer('gru_Can'); // ← Columna normal
            $table->time('gru_HLu', 6)->nullable();
            $table->string('gru_ALu', 5)->nullable();
            $table->time('gru_HMa', 6)->nullable();
            $table->string('gru_AMa', 5)->nullable();
            $table->time('gru_HMi', 6)->nullable();
            $table->string('gru_AMi', 5)->nullable();
            $table->time('gru_HJu', 6)->nullable();
            $table->string('gru_AJu', 5)->nullable();
            $table->time('gru_HVi', 6)->nullable();
            $table->string('gru_AVi', 5)->nullable();
            $table->time('gru_HSa', 6)->nullable();
            $table->string('gru_ASa', 5)->nullable();
            $table->string('gru_Des', 30)->nullable();
            $table->string('gru_Cla', 1);
            
            $table->timestamps();

            $table->foreign('ret_Id')->references('ret_Id')->on('reticula')->onUpdate('cascade');
            $table->foreign('doc_Id')->references('doc_Id')->on('docentes')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('grupos');
    }
};