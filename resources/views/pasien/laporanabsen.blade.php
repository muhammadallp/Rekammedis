<div class="container-fluid px-4">
    <!-- <h1 class="mt-4">Tables</h1> -->
    <form action="/viewpdf" method="GET" class="mb-3">
    <input type="hidden" name="month" id="month" value="{{ $month }}">
    <button type="submit" id="tampil" class="btn btn-primary mb-3">Print PDF</button>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user fa-fw"></i>
           Data Pasien
        </div>
        <div class="card-body">
            <table class="table" id="datatablesSimple">
                <thead>
                            <tr>
                                <th>Kode Pasien</th>
                                <th>Nama Pasien</th>
                                <th>Poli</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>tanggal</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $kr)
                            <tr>
                                <td>{{ $kr->nip }}</td>
                                <td>{{ $kr->nama_pasien }}</td>
                                <td>{{ $kr->poli}}</td>
                                <td>{{ $kr->jk }}</td>
                                <td>{{ $kr->alamat }}</td>
                                <td>{{date('d F Y', strtotime($kr->created_at))  }}</td>
                                {{-- <td>{{date('d F Y', strtotime( $kr->absen_pulang)) }}</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>