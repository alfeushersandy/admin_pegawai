<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\karyawan;
use DateTime;

class Karyawan3bulanController extends Controller
{
    public function index() 
    {
        $sekarang = new DateTime('today');
        $now = karyawan::whereRaw("DATEDIFF(NOW(), 'Tanggal_masuk') = ". 34)->get();
        return $now;
        // return view('karyawan.index', [
        //     'tittle' => 'karyawan 3 bulanan',
        //     'data_karyawan' => karyawan::all()->where('DATEDIFF(CURRDATE(), Tanggal_masuk)', [90, 110])
        // ]);
    }
}
