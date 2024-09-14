@extends('layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
    {{ session('success') }}
    </div>
    @endif
    <h1 class="h3 mb-2 text-gray-800">Data Pasien</h1>
    <a href="/pasien/create" class="btn btn-primary mb-3">Tambah Data</a>
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
                            <th>Kode Pasien</th>
                            <th>nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Nomor HandPone</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pasien as $dk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dk->nip }}</td>
                            <td>{{ $dk->nama_pasien }}</td>
                            <td>{{ $dk->jk }}</td>
                            <td>{{ $dk->nohp }}</td>
                            <td>{{ $dk->alamat }}</td>
                            
                            <td class="grid text-center">
                                {{-- <div class="container mt-4"> --}}
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-info btn-sm border-0 mx-1" href="/pasien/{{$dk->id}}">  <i class="fas fa-eye "></i></a>
                                        <a class="btn btn-warning btn-sm border-0 mx-1" href="/pasien/{{$dk->id}}/edit">  <i class="fas fa-pen "></i></a>
                                        <form method="post" action="/pasien/{{$dk->id}}" class="d-inline mx-1">
                                            @method('delete')
                                            @csrf
                                        <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Apakah anda yakin mau dihapus?')"><span><i class="fas fa-trash "></i></span></button>
                                        </form>
                                    </div>
                                  {{-- </div> --}}
                               
                            </td> 
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