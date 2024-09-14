@extends('layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
    {{ session('success') }}
    </div>
    @endif
    <h1 class="h3 mb-2 text-gray-800">Data Rekam Medis</h1>
    {{-- <a href="/rekammedis/create" class="btn btn-primary mb-3">Tambah Data</a> --}}
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
                            <th>Poli</th>
                            <th>ruangan</th>
                            <th>Keluhan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rekammedis as $dk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dk->nip }}</td>
                            <td>{{ $dk->nama_pasien }}</td>
                            <td>{{ $dk->poli }}</td>
                            <td>{{ $dk->ruangan }}</td>
                            <td>{{ $dk->keluhan }}</td>
                            <td>
                                @if ($dk->status === 0 )
                                    <p class="text-primary"> Proses </p>  
                                @elseif($dk->status === 1)
                                <p class="text-success"> Proses Pembayaran </p>
                                @else
                                   <p class="text-success"> Selesai </p>
                                @endif
                            </td>
                            
                            <td class="grid text-center">
                                @if ($dk->status === 0)
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-primary btn-sm border-0 mx-1" href="/rekammedis/{{$dk->id}}/edit">  <i class="fas fa-pen "></i></a>
                                </div>
                                @else
                                <a class="btn btn-primary btn-sm border-0 mx-1"  disabled  >  <i class="fas fa-pen "></i></a>
                            </div>
                                @endif
                                    
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