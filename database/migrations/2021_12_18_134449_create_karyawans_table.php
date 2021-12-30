<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->String('NIK');
            $table->String('Status_Karyawan');
            $table->String('Jenis_Kelamin');
            $table->String('Status_Perkawinan');
            $table->date('Tanggal_masuk');
            $table->date('Tanggal_lahir');
            $table->string('Tempat_lahir');
            $table->String('Departemen');
            $table->String('Jabatan');
            $table->String('Tugas_Jabatan');
            $table->String('Jenjang_pendidikan');
            $table->String('Jurusan_pendidikan')->nullable();
            $table->String('Tahun_lulus');
            $table->String('Nama_sekolah')->nullable();
            $table->String('Alamat');
            $table->String('No_Hp')->nullable();
            $table->String('NIK_KTP')->nullable();
            $table->String('Email')->nullable();
            $table->String('Agama')->nullable();
            $table->boolean('is_active')->default(true);
            $table->String('Foto')->nullable();
            $table->String('Berkas')->nullable();
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
        Schema::dropIfExists('karyawans');
    }
}
