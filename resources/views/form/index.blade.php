@extends('layouts.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tabel Form</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable File Form
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nama Form</th>
                        <th>Keterangan</th>
                        <th>Created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($form as $sop)
                    <tr>
                        <td><a href="/form/tampil/{{ $sop->id }}" target="blank">{{ $sop->Nama_form }}</a></td>
                        <td>{{ $sop->keterangan_form }}</td>
                        <td>{{ $sop->created_at }}</td>
                        @can('is_Admin')
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('form.destroy', $sop->id) }}" method="POST">                               
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                                <a class="btn btn-sm btn-primary mt-3" href="/form/edit/{{ $sop->id }}" role="button"><i class="fa fa-edit" aria-hidden="true"></i></a>
                            </td>                            
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection