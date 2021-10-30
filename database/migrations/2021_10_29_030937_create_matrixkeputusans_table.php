<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrixkeputusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrixkeputusans', function (Blueprint $table) {
            $table->increments('idmatrix');
            $table->unsignedInteger('idalternatif');
            $table->unsignedInteger('idbobot');
            $table->unsignedInteger('idskala');

            $table->foreign('idalternatif')->references('idalternatif')->on('alternatifs');
            $table->foreign('idbobot')->references('idbobot')->on('bobots');
            $table->foreign('idskala')->references('idskala')->on('skalas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matrixkeputusans');
    }
}
