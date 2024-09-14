@extends('layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
    {{ session('success') }}
    </div>
    @endif
    <h1 class="h3 mb-2 text-gray-800">Data Dokter</h1>
    @can('admin')
    <a href="/dokter/create" class="btn btn-primary mb-3">Tambah Data</a>
    @endcan
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nomor Induk Pegawai</th>
                            <th>nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Nomor HandPone</th>
                            <th>Alamat</th>
                            <th>Status Perkawinan</th>
                            @can('admin')
                            <th>Aksi</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dokter as $dk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dk->nik }}</td>
                            <td>{{ $dk->nama }}</td>
                            <td>{{ $dk->jk }}</td>
                            <td>{{ $dk->nohp }}</td>
                            <td>{{ $dk->alamat }}</td>
                            <td>{{ $dk->status_perkawinan }}</td>
                            @can('admin')
                            <td>
                                <a class="btn btn-warning btn-sm border-0" href="/dokter/{{$dk->id}}/edit">  <i class="fas fa-pen "></i></a>
                                <form method="post" action="/dokter/{{$dk->id}}" class="d-inline">
                                    @method('delete')
                                    @csrf
                                <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Apakah anda yakin mau dihapus?')"><span><i class="fas fa-trash "></i></span></button>
                                </form>
                            </td> 
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</div>

@endsection