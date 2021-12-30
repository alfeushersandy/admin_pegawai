@extends('layouts.main')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Karyawan Keluar</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Jabatan</th>
                                <th>Departemen</th>
                                <th>Tanggal_keluar</th>
                                <th>Alasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach ($karyawan as $kar)
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td> {{ $karyawan->Nama }} </td>
                                    <td>{{ $karyawan->NIK }}</td>
                                    <td>{{ $karyawan->Jabatan }}</td>
                                    <td>{{ $karyawan->Departemen }}</td>
                                    <td>{{ $karyawan->tanggal_keluar }}</td>
                                    <td>{{ $karyawan->alasan }}</td>
                                    
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

</div>
<!-- End of Main Content -->
@endsection