<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVrankingsTable extends Migration
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
        Schema::dropIfExists('vrankings');
    }

    private function createView(): string
    {
        return <<<SQL
            CREATE VIEW vranking AS
               SELECT idalternatif, nmalternatif, SUM(praranking) AS ranking 
                FROM vpraranking
                GROUP BY idalternatif 
            SQL;
    }
}
