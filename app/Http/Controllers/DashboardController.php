<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\karyawan;
use App\Models\karyawan_keluar;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        
    }
    
    public function index () 
    {
        $_1825 = DB::table('karyawans')->where('is_active', true)
                                    ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) >= 18')
                                    ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) <= 25')->count();
        $_2635 = DB::table('karyawans')->where('is_active', true)
                                    ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) >= 26')
                                    ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) <= 35')->count();
        $_3645 = DB::table('karyawans')->where('is_active', true)
                                    ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) >= 36')
                                    ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) <= 45')->count();
        $_4655 = DB::table('karyawans')->where('is_active', true)
                                    ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) >= 46')
                                    ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) <= 55')->count();
        $_56 = DB::table('karyawans')->where('is_active', true)
                                    ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) > 55')->count();
        $Manager = karyawan::jumlah_karyawan('Manager');
        $operasional = karyawan::jumlah_karyawan('Operasional');
        $staf = karyawan::jumlah_karyawan('Staff');
        $supervisor = karyawan::jumlah_karyawan('Supervisor');
        $general_manager = karyawan::jumlah_karyawan('General Manager');
        $direktur = karyawan::jumlah_karyawan('Direktur');
        $direktur_utama = karyawan::jumlah_karyawan('Direktur Utama');
        $_1825 = DB::table('karyawans')->where('is_active', TRUE)
                                        ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) >= 18')
                                        ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) <= 25')->count();
        $_2635 = DB::table('karyawans')->where('is_active', TRUE)
                                        ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) >= 26')
                                        ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) <= 35')->count();
                                        
        $_3645 = DB::table('karyawans')->where('is_active', TRUE)
                                        ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) >= 36')
                                        ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) <= 45')->count();
        $_4655 = DB::table('karyawans')->where('is_active', TRUE)
                                        ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) >= 46')
                                        ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) <= 55')->count();
        $_55 = DB::table('karyawans')->where('is_active', TRUE)
                                        ->whereRaw('YEAR(CURDATE())' . '-' . 'YEAR(Tanggal_lahir) >= 56')->count();
        return view('dashboard.index', [
            'tittle' => 'Dashboard',
            'Operasional' => $operasional,
            'Staff' => $staf,
            'Manager' => $Manager,
            'General_Manager' => $general_manager,
            'Supervisor' => $supervisor,
            'Direktur' => $direktur,
            'Direktur_Utama' => $direktur_utama,
            'total_karyawan' => karyawan::all()->count(),
            'karyawan_aktif' => karyawan::where('is_active', true)->count(),
            'karyawan_tidak_aktif' => karyawan::where('is_active', false)->count(),
            'karyawan_keluar' => karyawan_keluar::all()->count(),
            '_1825' => json_encode($_1825),
            '_2635' => json_encode($_2635),
            '_3645' => json_encode($_3645),
            '_4655' => json_encode($_4655),
            '_55' => json_encode($_55)
        ]);
    }
    public function about() 
    {
        return view('dashboard.index', [
            'tittle' => 'Dashboard'
        ]);
    }
}
