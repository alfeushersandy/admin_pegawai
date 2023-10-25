@extends('layouts.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">List Surat Keputusan</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            list Surat Keputusan
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nama Berkas</th>
                        <th>Keterangan</th>
                        <th>Created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($sk as $sk)
                    <tr>
                        <td><a href="/surat_keputusan/tampil/{{ $sk->id }}" target="blank">{{ $sk->Nama_berkas }}</a></td>
                        <td>{{ $sk->keterangan_berkas }}</td>
                        <td>{{ $sk->created_at }}</td>
                        @can('is_Admin')
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('sk.destroy', $sk->id) }}" method="POST">                               
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                                <a class="btn btn-sm btn-primary mt-3" href="/surat_keputusan/edit/{{ $sk->id }}" role="button"><i class="fa fa-edit" aria-hidden="true"></i></a>
                            </td>   
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection