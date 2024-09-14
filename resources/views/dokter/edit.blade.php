@extends('layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
            </div>
            <div class="card-body">
                
                <form method="post" action="/dokter/{{ $dokter->id }}">
                    @method('put')
                    @csrf
                
                    <div class="form-group">
                        <label for="nik">NIP</label>
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" value="{{ $dokter->nik }}" >
                        @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nohp">Nama</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $dokter->nama }}" >
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-control" name="jk" id="jk">
                            <option  value="{{ $dokter->jk }}"> {{ $dokter->jk }}</option>
                            <option value="laki-laki" >Laki Laki</option>
                            <option value="perempuan" >Perempuan</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="nohp">Nomor HandPone</label>
                        <input type="text" name="nohp" class="form-control @error('nohp') is-invalid @enderror" id="nohp" value="{{ $dokter->nohp }} " >
                        @error('nohp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{ $dokter->alamat }}" >
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jk">Status Perkawinan</label>
                        <select class="form-control" name="status_perkawinan" id="status_perkawinan">
                            <option value="{{ $dokter->status_perkawinan }}"> {{ $dokter->status_perkawinan }}</option>
                            <option value="belum menikah" >Belum Menikah</option>
                            <option value="sudah menikah" >Sudah Menikah</option>
                            <option value="cerai" >Cerai</option>
                        </select>
                      </div>
                     
                   
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </form>    
            </div>
        </div>
    </div>
</div>

@endsection