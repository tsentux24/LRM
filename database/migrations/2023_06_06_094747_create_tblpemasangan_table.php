<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblpemasanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpemasangan', function (Blueprint $table) {
            $table->char('no_seri', 55)->primary();
            $table->char('nama_brg', 100);
            $table->char('id_vendor', 15);
            $table->char('wajib_pajak', 100);
            $table->char('tgl_pasang');
            $table->char('keterangan', 135);
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
        Schema::dropIfExists('tblpemasangan');
    }
}
