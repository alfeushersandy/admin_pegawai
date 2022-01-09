<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\karyawan;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Karyawan3bulanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index() 
    {
        $karyawan = DB::table('tb_karyawan')->where('is_active', true)
                                       ->whereRaw('DATEDIFF(CURDATE(), Tanggal_masuk) >= 90')
                                       ->whereRaw('DATEDIFF(CURDATE(), Tanggal_masuk) <= 120')->get();
        return view('karyawan.index', [
            'tittle' => 'karyawan 3 bulanan',
            'data_karyawan' => $karyawan
        ]);
    }
}
