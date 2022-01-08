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
                    <form  method="post" action="/karyawan/update/{{ $karyawan->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Nama</label><input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" name="nama" value="{{ $karyawan->Nama }}"></div>
                            <div class="col-md-6"><label class="labels">NIK</label><input type="text" class="form-control @error('NIK') is-invalid @enderror" name="nik" placeholder="NIK" value="{{ $karyawan->NIK }}"></div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                <label for="exampleFormControlSelect1" >Status Karyawan</label>
                                <?php
                                    $options = array("Tetap", "Kontrak");
                                ?>
                                    <select class="form-control" id="exampleFormControlSelect1" name="status_karyawan">
                                        <?php foreach ($options as $option): ?>
                                            <option value="<?php echo $option; ?>"<?php if ($karyawan['Status_Karyawan'] == $option): ?> selected="selected"<?php endif; ?>>
                                                <?php echo $option; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>            
                        </div>
                        <div class="col-md-6">
                                <label for="exampleFormControlSelect1" >Jenis Kelamin</label>
                                <?php
                                        $options = array("Laki Laki", "Perempuan");
                                ?>

                                    <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                                        <?php foreach ($options as $option): ?>
                                            <option value="<?php echo $option; ?>"<?php if ($karyawan['Jenis_Kelamin'] == $option): ?> selected="selected"<?php endif; ?>>
                                        <?php echo $option; ?>
                                            </option>
                                        <?php endforeach; ?>
                                        </select>
                        </div>
                        <div class="col-md-6">
                                <label for="exampleFormControlSelect1" >Status Perkawinan</label>
                                <?php
                                                    $options = array("Belum Kawin", "Kawin Anak 0", "Kawin Anak 1", "kawin Anak 2", "Kawin Anak 3", "Kawin Anak 4", "Kawin Anak 5");
                                                ?>
                                                <select class="form-control" id="exampleFormControlSelect1" name="status_perkawinan">
                                                    <?php foreach ($options as $option): ?>
                                                        <option value="<?php echo $option; ?>"<?php if ($karyawan['Status_Perkawinan'] == $option): ?> selected="selected"<?php endif; ?>>
                                                            <?php echo $option; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>             
                        </div>
                            <div class="col-md-6"><label class="labels">Tanggal Masuk</label><input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" name="tanggal_masuk" value="{{ $karyawan->Tanggal_masuk }}"></div>
                            <div class="col-md-6"><label class="labels">Tanggal Lahir</label><input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ $karyawan->Tanggal_lahir }}"></div>
                            <div class="col-md-6"><label class="labels">Tempat Lahir</label><input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"  name="tempat_lahir" value="{{ $karyawan->Tempat_lahir }}"></div>
                        </div>
                        <div class="row mt-3">
                        <div class="col-md-6">
                                <label for="exampleFormControlSelect1" >Departemen</label>
                                <?php
                                                    $options = array("Directorate", "Finance", "Accounting", "HRD & GA", "Legal & Permit", "Marketing", "Project", "PPIC", "Procurement", "Information Technology",
                                                                    "AMP & SC Magelang", "AMP & SC Bawen", "AMP Gombong", "AMP & SC Purworejo", "CMP Magelang",
                                                                    "CMP Bawen", "CMP Kaliwungu", "Technical",  "Peralatan", "Precast & SC Tempuran", "Mining Kulon Progo", "Operasional", "PT. ADITYA", 
                                                                    "UNIT", "CKC", "CEO");
                                                ?>
                                                <select class="form-control" id="exampleFormControlSelect1" name="departemen">
                                                    <?php foreach ($options as $option): ?>
                                                        <option value="<?php echo $option; ?>"<?php if ($karyawan['Departemen'] == $option): ?> selected="selected"<?php endif; ?>>
                                                            <?php echo $option; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>                
                        </div>
                        <div class="col-md-6">
                                <label for="exampleFormControlSelect1" >Jabatan</label>
                                <?php
                                                    $options = array("Staff", "Operasional", "Supervisor", "Manager", "General Manager", "Direktur", "Direktur Utama");
                                                ?>

                                                <select class="form-control" id="exampleFormControlSelect1" name="jabatan">
                                                    <?php foreach ($options as $option): ?>
                                                        <option value="<?php echo $option; ?>"<?php if ($karyawan['Jabatan'] == $option): ?> selected="selected"<?php endif; ?>>
                                                            <?php echo $option; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                        </div>
                            <div class="col-md-12"><label class="labels">Tugas Jabatan</label><input type="text" class="form-control @error('tugas_jabatan') is-invalid @enderror" name="tugas_jabatan" value="{{ $karyawan->Tugas_Jabatan }}"></div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="p-3 py-5">
                    <div class="col-md-12">
                                <label for="exampleFormControlSelect1" >Jenjang Pendidikan</label>
                                <?php
                                $options = array("SD", "SLTP", "SLTA", "SMK", "D1", "D2", "D3", "D4",
                                                "S1", "S2", "S3", "Tidak Selesai Sekolah");
                            ?>

                            <select class="form-control" id="exampleFormControlSelect1" name="jenjang_pendidikan">
                                <?php foreach ($options as $option): ?>
                                    <option value="<?php echo $option; ?>"<?php if ($karyawan['Jenjang_pendidikan'] == $option): ?> selected="selected"<?php endif; ?>>
                                        <?php echo $option; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-12"><label class="labels">Jurusan Pendidikan</label><input type="text" class="form-control"  name="jurusan_pendidikan" value="{{ $karyawan->Jurusan_pendidikan }}"></div>
                        <div class="col-md-12"><label class="labels">Tahun Lulus</label><input type="text" class="form-control"  name="tahun_lulus" value="{{ $karyawan->Tahun_lulus }}" ></div>
                        <div class="col-md-12"><label class="labels">Nama Sekolah</label><input type="text" class="form-control"  name="nama_sekolah" value="{{ $karyawan->Nama_sekolah }}"></div>
                        <div class="col-md-12"><label class="labels">Foto Diri</label><img src="{{ asset('storage/' . $karyawan->Foto) }}" style="width:95px" class="mt-2 mb-2 ml-1"><input type="file" class="form-control @error('foto') is-invalid @enderror"  name="foto">
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
                        <div class="col-md-12"><label class="labels">Alamat</label><input type="text" class="form-control"  name="alamat" value="{{ $karyawan->Alamat }}"></div>
                        <div class="col-md-12"><label class="labels">No_hp</label><input type="text" class="form-control"  name="no_hp" value="{{ $karyawan->No_HP }}"></div>
                        <div class="col-md-12"><label class="labels">NIK KTP</label><input type="text" class="form-control"  name="nik_ktp" value="{{ $karyawan->NIK_KTP }}"></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control"  name="email" value="{{ $karyawan->Email }}"></div>
                        <div class="col-md-12"><label class="labels">Agama</label><input type="text" class="form-control"  name="agama" value="{{ $karyawan->Agama }}"></div>
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