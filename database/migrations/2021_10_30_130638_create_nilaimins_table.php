<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNilaiminsTable extends Migration
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
        Schema::dropIfExists('nilaimins');
    }

    private function createView(): string
    {
        return <<<SQL
            CREATE VIEW nilaimin AS
                SELECT 
                    idkriteria, 
                    nmkriteria, 
                    MIN(nilai) AS minimum 
                FROM vmatrixkeputusan GROUP BY idkriteria 
            SQL;
    }
}
