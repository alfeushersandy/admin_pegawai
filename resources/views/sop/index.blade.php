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
                        <th>Nama Berkas</th>
                        <th>Keterangan</th>
                        <th>Created_at</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($sop as $sop)
                    <tr>
                        <td><a href="/sop/tampil/{{ $sop->id }}" target="blank">{{ $sop->Nama_berkas }}</a></td>
                        <td>{{ $sop->keterangan }}</td>
                        <td>{{ $sop->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection