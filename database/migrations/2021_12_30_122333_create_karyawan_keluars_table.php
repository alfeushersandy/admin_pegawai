<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan_keluars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('karyawans_id');
            $table->date('tanggal_keluar');
            $table->string('alasan');
            $table->timestamps();
            $table->foreign('karyawans_id')->on('karyawans')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan_keluars');
    }
}
