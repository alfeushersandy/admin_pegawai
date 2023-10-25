@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <h2 class="text-center my-5">Ubah Password</h2>
        
        <div class="col-lg-8 mx-auto my-5">	

            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }} <br/>
                @endforeach
            </div>
            @endif

            <form action="/ubah-password/store" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="exampleInputPassword2">Password Lama</label>
                    <input type="password" class="form-control" name="password_lama">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Password baru</label>
                    <input type="password" class="form-control" name="password_baru">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="konfirmasi_password">
                </div>
                
                <input type="submit" value="Simpan" class="btn btn-primary mt-3">
            </form>
        </div>
    </div>

@endsection