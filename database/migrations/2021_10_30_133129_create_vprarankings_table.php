<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVprarankingsTable extends Migration
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
        Schema::dropIfExists('vprarankings');
    }

    private function createView(): string
    {
        return <<<SQL
            CREATE VIEW vpraranking AS
                SELECT vnormalisasi.*,(vnormalisasi.value*vnormalisasi.normalisasi) 
                AS praranking
                FROM vnormalisasi
                GROUP BY vnormalisasi.idmatrix  
            SQL;
    }
}
