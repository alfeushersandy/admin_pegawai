<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_keputusan extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nama_berkas',
        'keterangan_berkas',
        'uploaded_file'
    ];
}
