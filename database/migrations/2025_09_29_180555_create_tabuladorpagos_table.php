<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tabuladorpagos', function (Blueprint $table) {
            $table->integer('tab_Id', 4)->autoIncrement();
            $table->string('tab_NomTab', 30);
            $table->decimal('tab_Mon', 6, 0);
            $table->string('tab_Obs', 30)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tabuladorpagos');
    }
};