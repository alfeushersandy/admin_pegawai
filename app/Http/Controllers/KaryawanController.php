<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\karyawan_keluar;
use App\Exports\KaryawanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\File;


class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departemen = auth()->user()->departemen;
        if(Gate::allows('is_Admin') || auth()->user()->level == 1){
           $karyawan = karyawan::all();
        }else if(auth()->user()->level == 2){
            $karyawan = karyawan::where('Departemen' ,$departemen)->get();
        }else{
            abort(403);
        }
        return view('karyawan.index', [
            'tittle' => 'Halaman Karyawan',
            'data_karyawan' => $karyawan
        ]);
    }

    public function input()
    {
        $this->authorize('admin');
        return view('karyawan.insert', [
            'tittle' => 'Halaman Input Data'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $foto = "";
        $berkas = "";
        if($request->file('foto')){
            $foto = $request->file('foto')->store('foto_diri');
        }
        if($request->file('berkas')){
            $berkas = $request->file('berkas')->store('berkas');
        }
        // $this->validate($request, [
        //     'Nama' => 'required',
        //     'NIK' => 'required',
        //     'status_Karyawan' => 'required',
        //     'status_perkawinan' => 'required',
        //     'tanggal_masuk' => 'required',
        //     'tanggal_lahir' => 'required',
        //     'tempat_lahir' => 'required',
        //     'departemen' => 'required',
        //     'jabatan' => 'required',
        //     'tugas_jabatan' => 'required',
        //     'jenjang_pendidikan' => 'required',
        //     'jenjang_pendidikan' => 'required',
        //     'alamat' => 'required',
        //     'foto' => 'image|file|',
        //     'berkas' => 'mimes:pdf|max:10000|',
        // ]);
        
        karyawan::create([
            'Nama' => $request->nama,
            'NIK' => $request->nik,
            'Status_Karyawan' => $request->status_karyawan,
            'Jenis_Kelamin' => $request->jenis_kelamin,
            'Status_Perkawinan' => $request->status_perkawinan,
            'Tanggal_masuk' => $request->tanggal_masuk,
            'Tanggal_lahir' => $request->tanggal_lahir,
            'Tempat_lahir' => $request->tempat_lahir,
            'Departemen' => $request->departemen,
            'Jabatan' => $request->jabatan,
            'Tugas_Jabatan' => $request->tugas_jabatan,
            'Jenjang_pendidikan' => $request->jenjang_pendidikan,
            'Jurusan_pendidikan' => $request->jurusan_pendidikan,
            'Tahun_lulus' => $request->tahun_lulus,
            'Nama_sekolah' => $request->nama_sekolah,
            'Alamat' => $request->alamat,
            'No_Hp' => $request->no_hp,
            'NIK_KTP' => $request->nik_ktp,
            'Email' => $request->email,
            'Agama' => $request->agama,
            'is_active' => true,
            'Foto' => $foto,
            'Berkas' => $berkas


            

        ]);
        return redirect('/karyawan/aktif')
            ->with('success', 'Data berhasil di tambahkan');
        
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $departemen = auth()->user()->departemen;
        if(Gate::allows('is_Admin')){
           $karyawan = karyawan::where('is_active', 1)->latest('NIK')->get();
        }else{
            $karyawan = karyawan::where('Departemen' ,$departemen)->where('is_active', true)->get();
        }
        return view('karyawan.index', [
            'tittle' => 'Karyawan Aktif',
            'data_karyawan' => $karyawan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = karyawan::find($id);
        return view('karyawan.edit', [
            'karyawan' => $karyawan,
            'tittle' => 'Edit Karyawan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        

        $karyawan = karyawan::find($id);
        
        $karyawan->Nama = $request->nama;
        $karyawan->NIK = $request->nik;
        $karyawan->Status_Karyawan = $request->status_karyawan;
        $karyawan->Jenis_Kelamin = $request->jenis_kelamin;
        $karyawan->Status_Perkawinan = $request->status_perkawinan;
        $karyawan->Tanggal_masuk = $request->tanggal_masuk;
        $karyawan->Tanggal_lahir = $request->tanggal_lahir;
        $karyawan->Tempat_lahir = $request->tempat_lahir;
        $karyawan->Departemen = $request->departemen;
        $karyawan->Jabatan = $request->jabatan;
        $karyawan->Tugas_Jabatan = $request->tugas_jabatan;
        $karyawan->Jenjang_pendidikan = $request->jenjang_pendidikan;
        $karyawan->Jurusan_pendidikan = $request->jurusan_pendidikan;
        $karyawan->Tahun_lulus = $request->tahun_lulus;
        $karyawan->Nama_sekolah = $request->nama_sekolah;
        $karyawan->Alamat = $request->alamat;
        $karyawan->No_Hp = $request->no_hp;
        $karyawan->NIK_KTP = $request->nik_ktp;
        $karyawan->Email = $request->email;
        $karyawan->Agama = $request->agama;
        $karyawan->is_active = true;
        if($request->file('foto'))
         { 
            Storage::delete($karyawan->Foto);
            $karyawan->Foto = $request->file('foto')->store('foto_diri');
            }
        if($request->file('berkas')) {
            Storage::delete($karyawan->Berkas);
        $karyawan->Berkas = $request->file('berkas')->store('berkas');}
        $karyawan->save();

        return redirect('/karyawan/aktif')
            ->with('success', 'Data berhasil di ubah');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(karyawan $karyawan)
    {
        //
    }

    public function hapusSession(Request $request) {
		$request->session()->forget('nama');
		echo "Data telah dihapus dari session.";
	}

    public function detail ($id) 
    {
        $karyawan = karyawan::find($id);
        $masa = new karyawan;
        if($karyawan->is_active == true){
            return view('karyawan.detail', [
                'tittle' => 'Detail Karyawan',
                'karyawan' => $karyawan,
                'usia' => $masa->hitung_umur($karyawan->Tanggal_lahir, "today"),
                'masa_kerja' => $masa->hitung_umur($karyawan->Tanggal_masuk, "today")
            ]);
        }else{
            return view('karyawan.detail', [
                'tittle' => 'Detail Karyawan',
                'karyawan' => $karyawan,
                'usia' => $masa->hitung_umur($karyawan->Tanggal_lahir, "today"),
                'masa_kerja' => $masa->hitung_umur($karyawan->Tanggal_masuk, $karyawan->karyawan_keluar->tanggal_keluar)
            ]);
        }
        
    }

    public function tampil_pdf ($id) {
        $karyawan = karyawan::find($id);
        $pathtofile = 'storage/'.$karyawan->Berkas;
        return response()->file($pathtofile);

    }

    public function keluar($id) {
        $this->authorize('is_Admin');
        $karyawan = karyawan::find($id);
        return view('karyawan.keluar', [
            'tittle' => 'Form karyawan keluar',
            'karyawan' => $karyawan
        ]);
    }

    public function keluarkan(request $request, $id) 
    {
        $this->authorize('is_Admin');
        
        try{
            $karyawan = karyawan::find($id);
            $karyawan->is_active = false;
            $karyawan->save();

            karyawan_keluar::create([
                'karyawans_id' => $request->id,
                'tanggal_keluar' => $request->tanggal_keluar,
                'alasan' => $request->alasan
            ]);

            return redirect('/karyawan/aktif')
            ->with('success', 'data karyawan berhasil dikeluarkan');
            }catch (\Exception $e){
            return redirect()->back()
                ->with('error', 'data karyawan gagal dikeluarkan');
        }
            



        
    }
    public function karyawan_keluar() {
        return view('karyawan.listkeluar', [
            'karyawan' => karyawan_keluar::orderBy('Tanggal_Keluar','DESC')->get(),
            'tittle' => 'karyawan keluar'
        ]);
    }

    public function edit_karyawan_keluar($id) {
        $this->authorize('is_Admin');
        return view('karyawan.edit_keluar', [
            'karyawan' => karyawan_keluar::find($id),
            'tittle' => 'edit karyawan keluar'
        ]);
    }
    public function update_keluar(Request $request, $id){
        $this->authorize('is_Admin');
        $keluar = karyawan_keluar::find($id);
        $keluar->karyawans_id = $request->id;
        $keluar->tanggal_keluar = $request->tanggal_keluar;
        $keluar->alasan = $request->alasan; 
        $keluar->save();

        return redirect('/keluar')
            ->with('success', 'Data berhasil di ubah');
        
    }

    public function export_excel()
	{
        $this->authorize('is_Admin');
		return Excel::download(new KaryawanExport, 'karyawan.csv');
	}

    
}
