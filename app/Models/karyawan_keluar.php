<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan_keluar extends Model
{
    use HasFactory;
    protected $table = 'tb_keluar';
    protected $fillable = [
        'karyawans_id',
        'tanggal_keluar',
        'alasan'
    ];
    public function karyawan() {
        return $this->belongsTo(karyawan::class, 'Id_karyawan');
    }
}
