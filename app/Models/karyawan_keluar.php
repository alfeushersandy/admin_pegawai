<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan_keluar extends Model
{
    use HasFactory;
    protected $fillable = [
        'Id_karyawan',
        'tanggal_keluar',
        'alasan'
    ];
}
