@extends('layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Data Pasein</h6>
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <a href="/pasien" class="btn btn-primary ">Kembali</a>
                        <a href="/laporan/{{$pasien->id}}" class="btn btn-info ">Print PDF</a>
                      </div>
                    <div class="card-body">
                        <table width='100%'>
                       
                                <tr>
                                    <th align="left">
                                        Kode Pasien
                                    </th>
                                    <th align="left">
                                        :
                                    </th>
                                    <td  align="left">{{ $pasien->nip }}</td>

                                    <th align="right">
                                        Alamat
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <td>{{ $pasien->alamat }}</td>
                                </tr>
                                <tr>
                                    <th align="left">
                                        Nama Pasien
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <td>{{ $pasien->nama_pasien }}</td>

                                    <th align="right">
                                        Tempat Tanggal Lahir
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <td>{{ $pasien->tempat_lahir }} / {{ date('d-F-Y', strtotime($pasien->tgl_lahir)) }}</td>
                                </tr>
                               
                                <tr>
                                    <th align="left">
                                        Jenis Kelamin
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <td>{{ $pasien->jk }}</td>
                                    
                                    <th align="right">
                                        Status Perkawinan
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <td>{{ $pasien->status_perkawinan }}</td>
                                </tr>
                                <th align="left">
                                        Nomor HandPone
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <td>{{ $pasien->nohp }}</td>
                                    <th align="right">
                                        Tanggal Pendaftaran
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <td>{{ date('d-F-Y', strtotime($pasien->created_at)) }}</td>
                                </tr>
                               
                        </table>
                  
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                    <th>Tanggal Rekammedis</th>
                                    <th>Poli</th>
                                    <th>Kelas</th>
                                    <th>Keluhan</th>
                                    <th>Diagnosa</th>
                                    <th>Tindakan</th>
                                    <th>Obat</th>
                                    <th>Harga Obat</th>
                                    <th>Biaya Tindakan</th>
                                    <th>Sub Total</th>
                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rekam as $dk)
                                        <tr>
                                            <td>{{ date('d-F-Y', strtotime($dk->created_at)) }}</td>
                                            <td>{{ $dk->poli }}</td>
                                            <td>{{ $dk->class }}</td>
                                            <td>{{ $dk->keluhan }}</td>
                                            <td>{{ $dk->diagnosa }}</td>
                                            <td>{{ $dk->tindakan }}</td>
                                            <td> 
                                            @foreach($obat as $value)
                                            @if($value->id_rekam == $dk->id)
                                                    <p> {{ $value->nama }} </p>
                                                    @endif
                                                    @endforeach
                                                </td>

                                            <td> 
                                            @foreach($obat as $o)
                                            @if($o->id_rekam == $dk->id)
                                                    <p>{{ number_format($o->harga_obat,) }} </p>
                                                    @endif
                                                    @endforeach
                                                </td>
                                                <td>{{  number_format($dk->biaya)}}</td>
                                                @php
                                                    $total = $dk->biaya + $dk->ttl_hrg_obt;
                                                @endphp
                                               <td>{{  number_format($total) }}</td>
                                                
                                            
                                        </tr>
                                        @endforeach
        
                                            
                                     </tbody>
                                </table>
                    </div>
                  </div>    
            </div>
        </div>
    </div>
</div>

@endsection