<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\surat_keputusan;

class Surat_keputusanController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }
    public function index()
    {
        return view('surat_keputusan.index',[
            'tittle' => 'list Surat Keputusan',
            'sk' => surat_keputusan::all()
        ]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surat_keputusan.upload',[
            'tittle' => 'upload SK',
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_berkas' => 'required',
            'file_sk' => 'required|file|mimes:pdf',
            'keterangan' => 'required'
        ]);

	    

            surat_keputusan::create([
                'Nama_berkas' => $request->nama_berkas,
                'keterangan_berkas' => $request->keterangan,
                'uploaded_file' => $request->file('file_sk')->store('file_sk')
            ]);
            return redirect('/surat_keputusan')
                ->with('success', 'Data berhasil di tambahkan');
            
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tampil_pdf ($id) {
        $sop = Surat_keputusan::find($id);
        $pathtofile = 'storage/'.$sop->uploaded_file;
        return response()->file($pathtofile);

    }
}
