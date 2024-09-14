<?php $session = session(); ?>
<body onLoad="javascript:print()"> 
                            <div class="panel-heading">
                            <table width="100%">
							<tr>
							<td><div align="center">
							<div align="center">
                                <b>KLINIK PRATAMA SIMPANG TIGA<br>Jl. Lintas Ophir Barat No.RT.002, Koto Baru, Kec. Luhak Nan Duo, Kabupaten Pasaman Barat, Sumatera Barat.</b><br><hr><br>Laporan Data PerPasien<br><?= Date('d F Y'); ?></div>
							 </td>
							</tr>
							</table>
                    </div>
                    <br>
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
                                    Jenis Kelamin
                                    
                                </th>
                                <th>
                                    :
                                </th>
                                <td>{{ $pasien->jk }}</td>
                                
                            </tr>
                           
                            <tr>
                                <th align="left">
                                    Tempat Tanggal Lahir
                                </th>
                                <th>
                                    :
                                </th>
                                <td>{{ $pasien->tempat_lahir }} / {{ date('d-F-Y', strtotime($pasien->tgl_lahir)) }}</td>
                                
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
                    </div>   
                    <br>
                    <br>

                    <table id='theList' border=1 width='100%' class='table table-bordered table-striped' cellspacing="0">
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
                                    <p> Rp. {{ number_format($o->harga_obat,) }} </p>
                                    @endif
                                    @endforeach
                                </td>
                                <td> Rp. {{number_format($dk->biaya)}}</td>
                                @php
                                    $total = $dk->biaya + $dk->ttl_hrg_obt;
                                @endphp
                               <td> Rp. {{number_format($total) }}</td>
                                
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    <br>
                    <br>

                    <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
                        <tr>
                            <td width="63%" bgcolor="#FFFFFF">
                                <p align="center"></p><br/>
                            </td>
                            <td width="50%" bgcolor="#FFFFFF">
                                <div align="center">Klinik Pratama Simpang Tiga <?= Date('d F Y'); ?><br/>
                               Kepala Klinik Pratama Simpang Tiga
                                <br/><br/>
                                <br/><br/>
                                {{ session('puskesmas') }}
                                </div>
                            </td>
                        </tr>
                        </table> 