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
                        {{-- Featured --}}
                        {{-- <a href="#" class="btn btn-primary">Print</a> --}}
                        <a href="/rekammedis" class="btn btn-primary ">Kembali</a>
                        {{-- <a href="/laporan-karyawan" class="btn btn-info ">Print PDF</a> --}}
                      </div>
                    <div class="card-body">
                        <table>
                       
                                <tr>
                                    <th>
                                        Nomor Induk Penduduk
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <td>{{ $rekammedis->nip }}</td>
                                </tr>
                                <tr>
                                    <th>
                                        Nama Pasien
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <td>{{ $rekammedis->nama_pasien}}</td>
                                </tr>
                                <tr>
                                    <th>
                                        Nama Dokter
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <td>{{ $rekammedis->nama }}</td>
                                </tr>
                                <tr>
                                    <th>
                                        Poli
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <td>{{ $rekammedis->poli }}</td>
                                </tr>
                                <tr>
                                    <th>
                                        Jenis Kelamin
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <td>{{ $rekammedis->jk }}</td>
                                </tr>
                                    <th>
                                        Nomor HandPone
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <td>{{ $rekammedis->nohp }}</td>
                                </tr>
                                </tr>
                                    <th>
                                        Keluhan
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <td>{{ $rekammedis->keluhan }}</td>
                                </tr>
                                </tr>
                                    <th>
                                        Diagnosa
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <td>{{ $rekammedis->diagnosa }}</td>
                                </tr>
                                <tr>
                                    <th>
                                        Kelas
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <td>{{ $rekammedis->class }}</td>
                                </tr>

            @foreach($obat as $rekammedisdetails)
            @foreach($rekammedisdetails as $detail)
            <tr>
            <th>
                Nama Obat
            </th>
            <th>
                :
            </th>
            <td>{{ $detail->nama }}</td>
            </tr>
            <tr>
                <th>
                    Harga Perobat
                </th>
                <th>
                    :
                </th>
                <td>Rp. {{ number_format($detail->harga_obat,2) }}</td>
                </tr>
            <tr>
            <th>
                Keterangan
            </th>
            <th>
                :
            </th>
            <td>{{ $detail->keterangan }}</td>
        </tr>
         @php
            $total = 0;
            $total_bayar = $detail->harga_obat + $total;
        @endphp
        
            @endforeach
             @endforeach
             <tr>
                <th>
                    Total Harga Obat
                </th>
                <th>
                    :
                </th>
                <td>Rp. {{ number_format($totalHargaObat, 2) }}</td>
            </tr>
            @if ( $rekammedis->status  === 1 )
            <tr>
                <th>
                    Biaya Tindakan
                </th>
                <th>
                    :
                </th>
                 
                <td>
                    <form method="post" action="/rekammedis-update/{{ $id }}">
                        @method('put')
                    @csrf
                    <input type="text" name="biaya" class="form-control @error('biaya') is-invalid @enderror" id="biaya" placeholder="sialhakn masukan biaya tindakan"   >
                            @error('biaya')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <input type="hidden" name="ttl_hrg_obt" value ="{{ $totalHargaObat }}">
                            <input type="hidden" name="status" value ="2">
                </td>
            </tr>
            <tr>
                <th>
            
                </th>
                <th>
                    
                </th>
                <td>
                        <button type="submit" class="btn btn-primary mt-3">Proses</button>
                  </form>
                </td>
            
            </tr>
            @else
            <tr>
                <th>
                    Biaya Tindakan
                </th>
                <th>
                    :
                </th>
                <td>Rp. {{ number_format($rekammedis->biaya, 2) }}</td>
            </tr>
            <tr>
                <th>
                    Total Biaya
                </th>
                <th>
                    :
                </th>
                @php
                    $subtotal = $totalHargaObat + $rekammedis->biaya;
                @endphp
                <td>Rp. {{ number_format($subtotal, 2) }}</td>
            </tr>
         @endif
                </tr>     
            </table>
                    </div>
                  </div>    
            </div>
        </div>
    </div>
</div>

@endsection