<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVnormalisasisTable extends Migration
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
        Schema::dropIfExists('vnormalisasis');
    }

    private function createView(): string
    {
        return <<<SQL
            CREATE VIEW vnormalisasi AS
                SELECT vmatrixkeputusan.*, 
                    IF(vmatrixkeputusan.jeniskriteria = 'cost',(nilaimin.minimum/vmatrixkeputusan.nilai),(vmatrixkeputusan.nilai/nilaimax.maksimum)) 
                    AS normalisasi 
                FROM vmatrixkeputusan, nilaimax, nilaimin
                WHERE nilaimax.idkriteria = vmatrixkeputusan.idkriteria 
                GROUP by vmatrixkeputusan.idmatrix  
            SQL;
    }
}
