<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\karyawan_keluar;
use Illuminate\Http\Request;


class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('karyawan.index', [
            'tittle' => 'Halaman Karyawan',
            'data_karyawan' => karyawan::all()
        ]);
    }

    public function input()
    {
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
        //     'berkas' => 'mimes:pdf|max:10000',
        // ]);
        try{
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
            'Foto' => $request->file('foto')->store('foto_diri'),
            'Berkas' => $request->file('berkas')->store('berkas')


            

        ]);
        return redirect('/karyawan')
            ->with('success', 'Data berhasil di tambahkan');
        }catch (\Exception $e){
            return redirect()->back()
                ->with('error', 'Data gagal tambahkan');
        }
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('karyawan.index', [
            'tittle' => 'Karyawan Aktif',
            'data_karyawan' => karyawan::where('is_active', 1)
                    ->latest('NIK')->get()
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
        
        try{

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
         { $karyawan->Foto = $request->file('foto')->store('foto_diri');}
        if($request->file('berkas')) {
        $karyawan->Berkas = $request->file('berkas')->store('berkas');}
        $karyawan->save();

        return redirect('/karyawan')
            ->with('success', 'Data berhasil di ubah');
        }catch (\Exception $e){
            return redirect()->back()
                ->with('error', 'Data gagal diubah');
        }
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
        return view('karyawan.detail', [
            'tittle' => 'Detail Karyawan',
            'karyawan' => $karyawan,
            'usia' => $masa->hitung_umur($karyawan->Tanggal_lahir),
            'masa_kerja' => $masa->hitung_umur($karyawan->Tanggal_masuk)
        ]);
    }

    public function tampil_pdf ($id) {
        $karyawan = karyawan::find($id);
        $pathtofile = 'storage/'.$karyawan->Berkas;
        return response()->file($pathtofile);

    }

    public function keluar($id) {
        $karyawan = karyawan::find($id);
        return view('karyawan.keluar', [
            'tittle' => 'Form karyawan keluar',
            'karyawan' => $karyawan
        ]);
    }

    public function keluarkan(request $request, $id) 
    {
        
        
            $karyawan = karyawan::find($id);
            $karyawan->is_active = false;
            $karyawan->save();

            karyawan_keluar::create([
                'Id_karyawan' => $request->id,
                'tanggal_keluar' => $request->tanggal_keluar,
                'alasan' => $request->alasan
            ]);
            return redirect('/karyawan');
            




        
    }
    public function karyawan_keluar() {
        return view('karyawan.index');
    }
}
