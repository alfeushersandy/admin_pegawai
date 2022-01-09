@extends('layouts.main')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Detail Page</h1>

    </div>
    <!-- /.container-fluid -->
        <div class="card mb-3 ml-3" style="max-width: 1000px;">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="{{ asset('storage/' . $karyawan->Foto) }}"  style="width:350px; max-height:350px; overflow:hidden; margin-left:45px;" class="rounded-circle mt-3">
                </div>
                <div class="col-md-7">
                <div class="card-body ml-3">
                    <h2 class="card-title">{{ $karyawan->Nama }}</h2><br>   
                <div class="mt-10">                            
                    <p class="card-text">NIK : {{ $karyawan->NIK }}</p>
                    <p class="card-text">Status Karyawan : {{ $karyawan->Status_Karyawan }}</p>
                    <p class="card-text">Jenis Kelamin : {{ $karyawan->Jenis_Kelamin }}</p>
                    <p class="card-text">Status Perkawinan : {{ $karyawan->Status_Perkawinan }}</p>
                    <p class="card-text">Tanggal Masuk : {{ $karyawan->Tanggal_masuk }}</p>
                    <p class="card-text">Tanggal Lahir : {{ $karyawan->Tanggal_lahir }}</p>
                    <p class="card-text">Massa Kerja : {{ $masa_kerja }}</p>
                    <p class="card-text">Usia : {{ $usia }}</p>
                    <p class="card-text">Tempat Lahir : {{ $karyawan->Tempat_lahir }}</p>
                    <p class="card-text">Departemen : {{ $karyawan->Departemen }}</p>
                    <p class="card-text">Jabatan : {{ $karyawan->Jabatan }}</p>
                    <p class="card-text">Tugas Jabatan : {{ $karyawan->Tugas_Jabatan }}</p>
                    <p class="card-text">Jenjang Pendidikan : {{ $karyawan->Jenjang_pendidikan }}</p>
                    <p class="card-text">Jurusan Pendidikan : {{ $karyawan->Jurusan_pendidikan }}</p>
                    <p class="card-text">Tahun Lulus : {{ $karyawan->Tahun_lulus }}</p>
                    <p class="card-text">Nama Sekolah : {{ $karyawan->Nama_sekolah }}</p>
                    <p class="card-text">Alamat : {{ $karyawan->Alamat }}</p>
                    <p class="card-text">No Hp : {{ $karyawan->No_Hp }}</p>
                    <p class="card-text">NIK KTP : {{ $karyawan->NIK_KTP }}</p>
                    <p class="card-text">Email : {{ $karyawan->Email }}</p>
                    <p class="card-text">Agama : {{ $karyawan->Agama }}</p>                               
                </div> 
                <div>
                <a class="btn btn-primary mt-3" href="/karyawan/edit/{{ $karyawan->id }}" role="button">Edit</a>
               
                <a class="btn btn-danger mt-3 ml-2" href="/karyawan/tampils/{{ $karyawan->id }}" target="blank" role="button">Berkas</a>
                </div>
                <div>
                    <p class="card-text mt-3" style="text-align:right">Last update <span></span></p>
                </div>
            </div>
        </div>

</div>
<!-- End of Main Content -->
@endsection