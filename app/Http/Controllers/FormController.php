<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
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
        return view('form.index',[
            'tittle' => 'list Form',
            'form' => Form::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('form.upload',[
            'tittle' => 'upload form',
            
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
            'nama_form' => 'required',
            'file_form' => 'required|file|mimes:pdf',
            'keterangan' => 'required'
        ]);

	    

            Form::create([
                'Nama_form' => $request->nama_form,
                'keterangan_form' => $request->keterangan,
                'uploaded_file' => $request->file('file_form')->store('file_form')
            ]);
            return redirect('/form')
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
        $this->authorize('admin');
        return view('form.edit',[
            'tittle' => 'Edit Form',
            'form' => Form::find($id)
        ]);
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
        $sop = Form::find($id);

        if($request->hasFile('file_form')){
            Storage::delete($sop->uploaded_file);
            $sop->update([
                'Nama_form' => $request->nama_form,
                'keterangan_form' => $request->keterangan,
                'uploaded_file' => $request->file('file_form')->store('file_form')
            ]);
        }else{
            $sop->update([
                'Nama_form' => $request->nama_form,
                'keterangan_form' => $request->keterangan
            ]);
        }

        return redirect('/form')
            ->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::allows('is_admin')){
            $sop = Form::find($id);
            $sop->delete();
            return redirect()->route('form.index');
        }else{
            abort(403);
        }
    }

    public function tampil_pdf ($id) {
        $sop = Form::find($id);
        $pathtofile = 'storage/'.$sop->uploaded_file;
        return response()->file($pathtofile);

    }
}
