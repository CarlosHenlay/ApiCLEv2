<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dominios', function (Blueprint $table) {
            $table->integer('dom_Id', 4)->autoIncrement();
            $table->string('dom_Nom', 30);
            $table->string('dom_Mat1', 150);
            $table->string('dom_Mat2', 150)->nullable();
            $table->string('dom_Obs', 30)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dominios');
    }
};