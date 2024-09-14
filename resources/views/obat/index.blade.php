@extends('layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
    {{ session('success') }}
    </div>
    @endif
    <h1 class="h3 mb-2 text-gray-800">Data Obat</h1>
    <a href="/obat/create" class="btn btn-primary mb-3">Tambah Data</a>
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
                            <th>nama</th>
                            <th>Jenis Obat</th>
                            <th>Stok</th>
                            <th>Harga Perobat</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($obat as $dk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dk->nama }}</td>
                            <td>{{ $dk->jns_obat }}</td>
                            <td>{{ $dk->stok }}</td>
                            <td>Rp. {{ number_format($dk->harga_obat ,2) }}</td>
                            <td>{{  date('d F Y', strtotime($dk->created_at))  }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm border-0" href="/obat/{{$dk->id}}/edit">  <i class="fas fa-pen "></i></a>
                                <form method="post" action="/obat/{{$dk->id}}" class="d-inline">
                                    @method('delete')
                                    @csrf
                                <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Apakah anda yakin mau dihapus?')"><span><i class="fas fa-trash "></i></span></button>
                                </form>
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