<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('dominios', function (Blueprint $table) {
            $table->string('rol', 30)->nullable()->after('dom_Nom');
        });
    }

    public function down()
    {
        Schema::table('dominios', function (Blueprint $table) {
            $table->dropColumn('rol');
        });
    }
};