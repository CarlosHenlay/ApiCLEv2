<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('planestudios', function (Blueprint $table) {
            $table->integer('pla_Id')->autoIncrement(); // Solo esta columna auto_increment
            $table->string('pla_CveInt', 3);
            $table->string('pla_Nom', 30);
            $table->string('pla_CveOfi', 30)->nullable();
            $table->date('pla_Fei');
            $table->date('pla_Fef')->nullable();
            $table->string('pla_sta', 1);
            $table->integer('pla_cmod'); // ← QUITAR autoIncrement() de aquí
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('planestudios');
    }
};