@extends('layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
            </div>
            <div class="card-body">
                
                <form method="post" action="/pasien/">
                    @csrf
                    <div class="form-group">
                        <label for="jk">Poli</label>
                        <select class="form-control" name="id_poli" id="poli">
                            <option selected disabled> Silahkan Pilih Jenis Poli</option>
                            @foreach($poli as $pl)
                            <option value="{{ $pl->id }}" >{{ $pl->poli }}</option>
                            @endforeach
                        </select>
                      </div>

                    <div class="form-group">
                        <label for="nip">Kode Pasien</label>
                        <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" value="{{ $pasien }}" readonly >
                        @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nohp">Nama</label>
                        <input type="text" name="nama_pasien" class="form-control @error('nama_pasien') is-invalid @enderror" id="nama_pasien" value="{{ old('nama_pasien') }}" >
                        @error('nama_pasien')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-control" name="jk" id="jk">
                            <option selected disabled> Silahkan Pilih Jenis Kelamin</option>
                            <option value="laki-laki" >Laki Laki</option>
                            <option value="perempuan" >Perempuan</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="nohp">Nomor HandPone</label>
                        <input type="text" name="nohp" class="form-control @error('nohp') is-invalid @enderror" id="nohp" value="{{ old('nohp') }}" >
                        @error('nohp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{ old('alamat') }}" >
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" value="{{ old('tempat_lahir') }}" >
                        @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" value="{{ old('tgl_lahir') }}" >
                        @error('tgl_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jk">Status Perkawinan</label>
                        <select class="form-control" name="status_perkawinan" id="status_perkawinan">
                            <option selected disabled> Silahkan Pilih Status Perkawinan</option>
                            <option value="belum menikah" >Belum Menikah</option>
                            <option value="sudah menikah" >Sudah Menikah</option>
                            <option value="cerai" >Cerai</option>
                        </select>
                      </div>

                    
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>    
            </div>
        </div>
    </div>
</div>

@endsection