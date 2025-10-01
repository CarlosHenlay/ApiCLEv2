<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('parametros', function (Blueprint $table) {
            $table->integer('par_Id', 11)->autoIncrement();
            $table->string('par_NomPar', 80);
            $table->string('par_Val1', 80);
            $table->string('par_Val2', 80)->nullable();
            $table->string('par_Val3', 80)->nullable();
            $table->string('par_Obs', 30)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parametros');
    }
};