<div class="container-fluid px-4">
    <!-- <h1 class="mt-4">Tables</h1> -->
     @if ($count === 0)
                <H2> Maaf Data Tidak Ada</H2>
   
        
    @else
    <form action="/view-pdf-pendapatan" method="GET" class="mb-3">
    <input type="hidden" name="month" id="month" value="{{ $month }}">
    <button type="submit" id="tampil" class="btn btn-primary mb-3">Print PDF</button>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user fa-fw"></i>
           Data Pendapatan
        </div>
        <div class="card-body">
           
            <table class="table" id="datatablesSimple">
                <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jumlah Pasien</th>
                                <th>Biaya Obat</th>
                                <th>Biaya Tindakan</th>
                                <th> Total</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <th colspan="4">Sub Total</th>
                                @php
                                $totalsemua = $total->totalobat + $total->totalbiaya;
                                @endphp
                                <td>Rp. {{ number_format($totalsemua, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif