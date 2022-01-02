<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sop;
class SopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sop.index',[
            'tittle' => 'list SOP',
            'sop' => sop::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sop.upload',[
            'tittle' => 'upload SOP',
            
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
            'file_sop' => 'required|file|mimes:pdf',
            'keterangan' => 'required'
        ]);

	    

            sop::create([
                'Nama_berkas' => $request->nama_berkas,
                'keterangan' => $request->keterangan,
                'uploaded_file' => $request->file('file_sop')->store('file_sop')
            ]);
            return redirect('/sop')
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
        $sop = sop::find($id);
        $pathtofile = 'storage/'.$sop->uploaded_file;
        return response()->file($pathtofile);

    }
}
