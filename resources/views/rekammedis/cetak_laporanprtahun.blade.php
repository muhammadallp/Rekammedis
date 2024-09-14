<?php $session = session(); ?>
<body onLoad="javascript:print()"> 


                            <div class="panel-heading">
                            <table width="100%">
							<tr>
							<td><div align="center">
							<div align="center">
                                <b>KLINIK PRATAMA SIMPANG TIGA<br>Jl. Lintas Ophir Barat No.RT.002, Koto Baru, Kec. Luhak Nan Duo, Kabupaten Pasaman Barat, Sumatera Barat.</b><br><hr><br>Laporan Rekam Medis<br> Tahun : {{ $bulan  }} </div>
							 </td>
							</tr>
							</table>
                    </div>
                    
                    <br>
                    <table id='theList' border=1 width='100%' class='table table-bordered table-striped' cellspacing="0">

                            <tr>
                                <th>Kode Pasien</th>
                                <th>Nama Pasien</th>
                                <th>Poli</th>
                                <th>Kelas</th>
                                <th>Keluhan</th>
                                <th>Diagnosa</th>
                                <th>Tanggal</th>
                            </tr>

                            @foreach($pasien as $kr)
                            <tr>
                                <td>{{ $kr->nip }}</td>
                                <td>{{ $kr->nama_pasien }}</td>
                                <td>{{ $kr->poli}}</td>
                                <td>{{ $kr->class }}</td>
                                <td>{{ $kr->keluhan }}</td>
                                <td>{{ $kr->diagnosa }}</td>
                                <td>{{date('d F Y', strtotime($kr->created_at))  }}</td>
                            </tr>
                            @endforeach

                    </table>
                    <br>
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