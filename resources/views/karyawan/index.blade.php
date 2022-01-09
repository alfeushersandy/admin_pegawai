@extends('layouts.main')

@section('content')
<div class="container-fluid px-4">
<h1 class="mt-4">Tabel Karyawan</h1>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Karyawan
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>NIK</th>
                    <th>Jabatan</th>
                    <th>Departemen</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data_karyawan as $karyawan)
                <tr>
                    <td><a href="/karyawan/detail/{{ $karyawan->ID }}">{{ $karyawan->Nama }}</a></td>
                    <td>{{ $karyawan->NIK }}</td>
                    <td>{{ $karyawan->Jabatan }}</td>
                    <td>{{ $karyawan->Departemen }}</td>
<<<<<<< HEAD
                    <td><a  href="/karyawan/keluar/{{ $karyawan->id }}"><i class="fas fa-sign-out-alt "></i></a></td>
=======
                    <td><a href="/karyawan/keluar/{{ $karyawan->ID }}">keluar</a></td>
>>>>>>> 5034cd0dfb505848fc8ad02233cff5a0ba0ee21d
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
