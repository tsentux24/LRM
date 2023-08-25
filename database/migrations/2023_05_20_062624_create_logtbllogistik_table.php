<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogtbllogistikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logtbllogistik', function (Blueprint $table) {
            $table->id();
            $table->char('no_seri', 55);
            $table->char('nama_brg', 100);
            $table->char('oldstatus', 150);
            $table->char('newstatus', 150);
            $table->char('kondisi', 100);
            $table->char('tgl_mutasi');
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
        Schema::dropIfExists('logtbllogistik');
    }
}
