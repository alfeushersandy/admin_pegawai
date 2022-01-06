@extends('layouts.main')

@section('content')
    <!-- Begin Page Content -->
    <div class="container">

        <!-- DataTales Example -->
        <div class="container-fluid px-4">
        <h1 class="mt-2">Tabel Karyawan Keluar</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Karyawan
            </div>
            <div class="card-body">
        <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Jabatan</th>
                                <th>Departemen</th>
                                <th>Tanggal_keluar</th>
                                <th>Alasan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach ($karyawan as $kar)
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td> {{ $kar->karyawan->Nama }} </td>
                                    <td>{{ $kar->karyawan->NIK }}</td>
                                    <td>{{ $kar->karyawan->Jabatan }}</td>
                                    <td>{{ $kar->karyawan->Departemen }}</td>
                                    <td>{{ $kar->Tanggal_Keluar }}</td>
                                    <td>{{ $kar->Alasan }}</td>
                                    <td><a href="">edit</a></td>
                                    
                                </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection