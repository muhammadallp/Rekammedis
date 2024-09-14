<?php $session = session(); ?>
<body onLoad="javascript:print()"> 


                            <div class="panel-heading">
                            <table width="100%">
							<tr>
							<td><div align="center">
							<div align="center">
                                <b>KLINIK PRATAMA SIMPANG TIGA<br>Jl. Lintas Ophir Barat No.RT.002, Koto Baru, Kec. Luhak Nan Duo, Kabupaten Pasaman Barat, Sumatera Barat.</b><br><hr><br>Laporan Pendapatan<br> Bulan : {{ $bulan  }} </div>
							 </td>
							</tr>
							</table>
                    </div>
                    
                    <br>
                    <table id='theList' border=1 width='100%' class='table table-bordered table-striped' cellspacing="0">

                            <tr>
                                <th>Tanggal</th>
                                <th>Jumlah Pasien</th>
                                <th>Biaya Obat</th>
                                <th>Biaya Tindakan</th>
                                <th> Total</th>
                            </tr>

                            @foreach($transaksi as $kr)
                            <tr>
                                <td>{{date('d F Y', strtotime($kr->created_at))  }}</td>
                                <td>{{ $kr->transaksi }}</td>
                                <td>Rp.{{  number_format($kr->totalobat,2) }}</td>
                                <td>Rp.{{  number_format($kr->totalbiaya,2) }}</td>
                                @php
                                $subtotal = $kr->totalobat + $kr->totalbiaya;
                                @endphp
                                <td>Rp. {{ number_format($subtotal, 2) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <th align="left" colspan="4">Sub Total</th>
                                @php
                                $totalsemua = $total->totalobat + $total->totalbiaya;
                                @endphp
                                <td>Rp. {{ number_format($totalsemua, 2) }}</td>
                            </tr>

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