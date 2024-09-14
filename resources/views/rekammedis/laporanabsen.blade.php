<div class="container-fluid px-4">
    <!-- <h1 class="mt-4">Tables</h1> -->
    @if ($count === 0)
    <H2> Maaf Data TIdak Ada</H2>
@else

    <form action="/view-pdf" method="GET" class="mb-3">
    <input type="hidden" name="month" id="month" value="{{ $month }}">
    <input type="hidden" name="poli" id="poli" value="{{ $poli }}">
    <button type="submit" id="tampil" class="btn btn-primary mb-3">Print PDF</button>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user fa-fw"></i>
           Data Rekammedis
        </div>
        <div class="card-body">
            <table class="table" id="datatablesSimple">
                <thead>
                            <tr>
                                <th>Kode Pasien</th>
                                <th>Nama Pasien</th>
                                <th>poli</th>
                                <th>Kelas</th>
                                <th>Keluhan</th>
                                <th>Diagnosa</th>
                                <th>Tanggal</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $kr)
                            <tr>
                                <td>{{ $kr->nip }}</td>
                                <td>{{ $kr->nama_pasien }}</td>
                               
                                <td>{{ $kr->poli }}</td>
                                <td>{{ $kr->class }}</td>
                                <td>{{ $kr->keluhan }}</td>
                                <td>{{ $kr->diagnosa }}</td>
                                <td>{{date('d F Y', strtotime($kr->created_at))  }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif