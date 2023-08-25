<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblwajibpajakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblwajibpajak', function (Blueprint $table) {
            $table->id();
            $table->char('status', 10);
            $table->char('grup', 50);
            $table->char('wajib_pajak', 100);
            $table->char('vendor', 25);
            $table->char('tgl_pasang');
            $table->char('alamat', 100);
            $table->char('wilayah', 55);
            $table->char('kategori_wp', 10);
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
        Schema::dropIfExists('tblwajibpajak');
    }
}
