<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class karyawan extends Model
{
    use HasFactory;
    protected $table = 'tb_karyawan';
    protected $fillable = [
                            'Nama',
                            'NIK',
                            'Status_Karyawan',
                            'Jenis_Kelamin',
                            'Status_Perkawinan',
                            'Tanggal_masuk',
                            'Tanggal_lahir',
                            'Tempat_lahir',
                            'Departemen',
                            'Jabatan',
                            'Tugas_Jabatan',
                            'Jenjang_pendidikan',
                            'Jurusan_pendidikan',
                            'Tahun_lulus',
                            'Nama_sekolah',
                            'Alamat',
                            'No_Hp',
                            'NIK_KTP',
                            'Email',
                            'Agama',
                            'is_active',
                            'Foto',
                            'Berkas'
                            ];

    public function hitung_umur($awal, $akhir){
    
        
        $birthDate = new DateTime($awal);
        $today = new DateTime($akhir);
        if ($birthDate > $today) { 
            exit("0 tahun 0 bulan 0 hari");
        }
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        return $y." tahun ".$m." bulan ".$d." hari";
    }

    public function karyawan_keluar() {
        return $this->hasOne(karyawan_keluar::class, 'karyawans_id');
    }

    
}
