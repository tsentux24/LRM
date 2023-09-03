<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Grammars\RenameColumn;
use Illuminate\Support\Facades\Schema;

class CreateTbllogistikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbllogistik', function (Blueprint $table) {
            $table->char('no_seri', 55)->primary();
            $table->char('nama_brg', 100);
            $table->char('costumer', 25);
            $table->char('istatus', 150);
            $table->char('wilayah', 150);
            $table->char('kondisi', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbllogistik');
    }
}
