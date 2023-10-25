<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UbahPasswordController extends Controller
{
    public function index(){
        return view('ubah_password.index', [
            'tittle' => 'ubah password',
            ]
        );
    }

    public function store(Request $request){
        

        if($request->password_baru == $request->konfirmasi_password){
            $user = User::where('id', auth()->user()->id)->update([
                'password' => hash::make($request->password_baru),
            ]);
            return redirect('/ubah-password')->with('success', 'Password Berhasil Diubah');
        }else{
            return redirect('/ubah-password')->with('info', 'Konfirmasi Password tidak sama');
        }
    }
}
