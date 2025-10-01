<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->integer('est_id', 4)->autoIncrement();
            $table->string('est_Nom', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estados');
    }
};