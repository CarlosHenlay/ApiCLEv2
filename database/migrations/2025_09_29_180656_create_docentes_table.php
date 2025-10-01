<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->integer('doc_Id')->autoIncrement(); // Solo ESTA columna auto_increment
            
            // Columnas normales
            $table->string('doc_Nom', 20);
            $table->string('doc_AppPat', 20);
            $table->string('doc_AppMat', 20)->nullable();
            $table->string('doc_Ges', 15)->nullable();
            $table->string('doc_ComEst', 30)->nullable();
            $table->string('doc_TelPer', 15)->nullable();
            $table->string('doc_TelCasa', 15)->nullable();
            $table->string('doc_Correo', 30)->nullable();
            $table->string('doc_CalleNum', 30);
            $table->string('doc_Col', 30);
            $table->string('doc_Loc', 30);
            
            // Claves foráneas - SOLO integer normales
            $table->integer('min_Id');
            $table->integer('est_Id');
            $table->integer('usu_Id');
            
            // Columnas normales
            $table->date('doc_FechIng');
            $table->string('doc_Obs', 50)->nullable();
            
            $table->timestamps();

            $table->foreign('min_Id')->references('mun_id')->on('municipios')->onUpdate('cascade');
            $table->foreign('est_Id')->references('est_id')->on('estados')->onUpdate('cascade');
            $table->foreign('usu_Id')->references('usu_Id')->on('usuarios')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('docentes');
    }
};