@extends('layouts.main')

@section('content')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Form Input Karyawan</h1>
        <!-- Form input Karyawan -->
        <div class="container rounded bg-white">
        <div class="row">
            
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <form  method="post" action="/karyawan/store" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Nama</label><input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" name="nama"></div>
                            <div class="col-md-6"><label class="labels">NIK</label><input type="text" class="form-control @error('NIK') is-invalid @enderror" name="nik" placeholder="NIK"></div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                <label for="exampleFormControlSelect1" >Status Karyawan</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="status_karyawan">
                                <option>Tetap</option>
                                <option>Kontrak</option>
                                </select>
                        </div>
                        <div class="col-md-6">
                                <label for="exampleFormControlSelect1" >Jenis Kelamin</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                                <option>Laki Laki</option>
                                <option>Perempuan</option>
                                </select>
                        </div>
                        <div class="col-md-6">
                                <label for="exampleFormControlSelect1" >Status Perkawinan</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="status_perkawinan">
                                <option>Belum Kawin</option>
                                <option>Kawin Anak 0</option>
                                <option>Kawin Anak 1</option>
                                <option>Kawin Anak 2</option>
                                <option>Kawin Anak 3</option>
                                <option>Kawin Anak 4</option>
                                <option>Kawin Anak 5</option>
                                </select>
                        </div>
                            <div class="col-md-6"><label class="labels">Tanggal Masuk</label><input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" name="tanggal_masuk"></div>
                            <div class="col-md-6"><label class="labels">Tanggal Lahir</label><input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"></div>
                            <div class="col-md-6"><label class="labels">Tempat Lahir</label><input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"  name="tempat_lahir"></div>
                        </div>
                        <div class="row mt-3">
                        <div class="col-md-6">
                                <label for="exampleFormControlSelect1" >Departemen</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="departemen">
                                <option>Directorate</option>
                                <option>Finance</option>
                                <option>Accounting</option>
                                <option>HRD & GA</option>
                                <option>Legal & Permit</option>
                                <option>Marketing</option>
                                <option>Project</option>
                                <option>PPIC</option>
                                <option>Procurement</option>
                                <option>Information Technology</option>
                                <option>AMP & SC Magelang</option>
                                <option>AMP & SC Bawen</option>
                                <option>AMP Gombong</option>
                                <option>AMP & SC Purworejo</option>
                                <option>CMP Magelang</option>
                                <option>CMP Bawen</option>
                                <option>CMP Kaliwungu</option>
                                <option>Technical</option>
                                <option>Peralatan</option>
                                <option>Precast & SC Tempuran</option>
                                <option>Mining Kulon Progo</option>
                                <option>Operasional</option>
                                <option>PT ADITYA</option>
                                <option>UNIT</option>
                                <option>CKC</option>
                                <option>CEO</option>
                                </select>
                        </div>
                        <div class="col-md-6">
                                <label for="exampleFormControlSelect1" >Jabatan</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="jabatan">
                                <option>Operasional</option>
                                <option>Staff</option>
                                <option>Supervisor</option>
                                <option>Manager</option>
                                <option>General Manager</option>
                                <option>Direktur</option>
                                <option>Direktur Utama</option>
                                </select>
                        </div>
                            <div class="col-md-12"><label class="labels">Tugas Jabatan</label><input type="text" class="form-control @error('tugas_jabatan') is-invalid @enderror" name="tugas_jabatan" ></div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="p-3 py-5">
                    <div class="col-md-12">
                                <label for="exampleFormControlSelect1" >Jenjang Pendidikan</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="jenjang_pendidikan">
                                <option>SD</option>
                                <option>SLTP</option>
                                <option>SLTA</option>
                                <option>SMK</option>
                                <option>D1</option>
                                <option>D2</option>
                                <option>D3</option>
                                <option>D4</option>
                                <option>S1</option>
                                <option>S2</option>
                                <option>S3</option>
                                <option>Tidak Selesai Sekolah</option>
                                </select>
                        </div>
                        <div class="col-md-12"><label class="labels">Jurusan Pendidikan</label><input type="text" class="form-control"  name="jurusan_pendidikan"></div>
                        <div class="col-md-12"><label class="labels">Tahun Lulus</label><input type="text" class="form-control"  name="tahun_lulus"></div>
                        <div class="col-md-12"><label class="labels">Nama Sekolah</label><input type="text" class="form-control"  name="nama_sekolah"></div>
                        <div class="col-md-12"><label class="labels">Foto Diri</label><input type="file" class="form-control @error('foto') is-invalid @enderror"  name="foto">
                            @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror</div>
                        <div class="col-md-12"><label class="labels">Berkas</label><input type="file" class="form-control @error('berkas') is-invalid @enderror"  name="berkas">
                            @error('berkas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror</div>
                    </div>
                </div>
                <div class="col-md-3" style="margin-top: 55px">
                    <div class="p-3 py-0">
                        <div class="col-md-12"><label class="labels">Alamat</label><input type="text" class="form-control"  name="alamat"></div>
                        <div class="col-md-12"><label class="labels">No_hp</label><input type="text" class="form-control"  name="no_hp"></div>
                        <div class="col-md-12"><label class="labels">NIK KTP</label><input type="text" class="form-control"  name="nik_ktp"></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control"  name="email"></div>
                        <div class="col-md-12"><label class="labels">Agama</label><input type="text" class="form-control"  name="agama"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Save Data</button></div>
                </div>
            </form>
        </div>
    </div>
    


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection