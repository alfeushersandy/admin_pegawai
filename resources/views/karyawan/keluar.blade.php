@extends('layouts.main')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Form Karyawan Keluar</h1>
        <!-- Form input Karyawan -->
            <form class="col-6" action="/karyawan/confirmkeluar/{{ $karyawan->id }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{  $karyawan->id  }}">
                <div class="form-group">
                    <label for="Nama">Nama</label>
                    <input type="text" class="form-control" name="Nama" aria-describedby="emailHelp" required value="{{  $karyawan->Nama  }}">
                </div>
                <div class="form-group">
                    <label for="NIK">NIK</label>
                    <input type="text" class="form-control" name="NIK" required value="{{  $karyawan->NIK  }}">
                </div>
                <div class="form-group">
                    <label for="Jabatan">Jabatan</label>
                    <input type="text" class="form-control" name="Jabatan" required value="{{  $karyawan->Jabatan  }}">
                    <label for="Jabatan">Departemen</label>
                    <input type="text" class="form-control" name="Departemen" required value="{{  $karyawan->Departemen  }}">
                    <label for="Jabatan">Tanggal Keluar</label>
                    <input type="date" class="form-control" name="tanggal_keluar" >
                    <label for="Jabatan">Alasan</label>
                    <input type="text" class="form-control" name="alasan" >
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Ubah data</button>
            </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection