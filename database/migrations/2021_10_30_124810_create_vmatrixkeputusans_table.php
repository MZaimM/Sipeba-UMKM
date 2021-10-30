<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVmatrixkeputusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vmatrixkeputusans');
    }

    private function createView(): string
    {
        return <<<SQL
            CREATE VIEW vmatrixkeputusan AS
                SELECT matrixkeputusans.idmatrix, alternatifs.*, kriterias.*,bobots.idbobot, 
                    bobots.value, skalas.value AS nilai, skalas.keterangan 
                FROM matrixkeputusans, skalas, bobots, kriterias, alternatifs 
                    WHERE matrixkeputusans.idalternatif = alternatifs.idalternatif 
                    AND matrixkeputusans.idbobot = bobots.idbobot 
                    AND matrixkeputusans.idskala = skalas.idskala 
                    AND kriterias.idkriteria = bobots.idkriteria 
            SQL;
    }
}
