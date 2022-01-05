<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\karyawan;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index () 
    {
        $Manager = karyawan::jumlah_karyawan('Manager');
        $operasional = karyawan::jumlah_karyawan('Operasional');
        $staf = karyawan::jumlah_karyawan('Staff');
        $supervisor = karyawan::jumlah_karyawan('Supervisor');
        $general_manager = karyawan::jumlah_karyawan('General Manager');
        $direktur = karyawan::jumlah_karyawan('Direktur');
        $direktur_utama = karyawan::jumlah_karyawan('Direktur Utama');
        return view('dashboard.index', [
            'tittle' => 'Dashboard',
            'Operasional' => $operasional,
            'Staff' => $staf,
            'Manager' => $Manager,
            'General_Manager' => $general_manager,
            'Supervisor' => $supervisor,
            'Direktur' => $direktur,
            'Direktur_Utama' => $direktur_utama,
        ]);
    }
    public function about() 
    {
        return view('dashboard.index', [
            'tittle' => 'Dashboard'
        ]);
    }
}
