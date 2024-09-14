@extends('layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
    {{ session('success') }}
    </div>
    @endif
    <h1 class="h3 mb-2 text-gray-800">Data petugas</h1>
    @can('admin')
    <a href="/petugas/create" class="btn btn-primary mb-3">Tambah Data</a>
    @endcan
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
                            <th>Foto</th>
                            @can('admin')
                            <th>Aksi</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($suster as $dk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dk->nik }}</td>
                            <td>{{ $dk->nama }}</td>
                            <td>{{ $dk->jk }}</td>
                            <td>{{ $dk->nohp }}</td>
                            <td>{{ $dk->alamat }}</td>
                            <td>{{ $dk->foto }}</td>
                            @can('admin')
                            <td>
                                <a class="btn btn-warning btn-sm border-0" href="/petugas/{{$dk->id}}/edit">  <i class="fas fa-pen "></i></a>
                                <form method="post" action="/petugas/{{$dk->id}}" class="d-inline">
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