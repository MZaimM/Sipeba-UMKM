<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNilaimaxesTable extends Migration
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
        Schema::dropIfExists('nilaimaxes');
    }

    private function createView(): string
    {
        return <<<SQL
            CREATE VIEW nilaimax AS
            SELECT 
                idkriteria, 
                nmkriteria, 
                MAX(nilai) AS maksimum 
            FROM vmatrixkeputusan GROUP BY idkriteria  
            SQL;
    }
}
