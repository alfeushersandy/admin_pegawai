@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <h2 class="text-center my-5">EDIT FILE SK</h2>
        
        <div class="col-lg-8 mx-auto my-5">	

            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }} <br/>
                @endforeach
            </div>
            @endif

            <form action="/surat_keputusan/update/{{ $sk->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="exampleInputPassword2">Nama Berkas</label>
                    <input type="text" class="form-control" name="nama_berkas" value="{{ $sk->Nama_berkas }}">
                  </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">File SK</label>
                    <input type="file" class="form-control-file mt-3" name="file_sk">
                  </div>

                <div class="form-group mt-3">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan">{{ $sk->keterangan_berkas }}</textarea>
                </div>
                <input type="submit" value="Upload" class="btn btn-primary mt-3">
            </form>
        </div>
    </div>

@endsection