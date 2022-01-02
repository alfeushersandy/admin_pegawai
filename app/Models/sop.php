<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sop extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nama_berkas',
        'keterangan',
        'uploaded_file'
    ];
}
