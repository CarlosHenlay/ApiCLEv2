<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reticula', function (Blueprint $table) {
            $table->integer('ret_Id')->autoIncrement(); // Solo ESTA columna auto_increment
            $table->string('ret_Mod', 5);
            $table->string('ret_Nom', 30);
            $table->integer('ret_Ord'); // ← QUITAR autoIncrement()
            $table->integer('pla_Id'); // ← QUITAR autoIncrement()
            $table->timestamps();

            $table->foreign('pla_Id')->references('pla_Id')->on('planestudios')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reticula');
    }
};