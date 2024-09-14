@extends('layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
            </div>
            <div class="card-body">
                
                <form method="post" action="/ruangan/">
                    @csrf
                
              
                    <div class="form-group">
                        <label for="nohp">Nama Ruangan</label>
                        <input type="text" name="ruangan" class="form-control @error('ruangan') is-invalid @enderror" id="ruangan" value="{{ old('ruangan') }}" >
                        @error('ruangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="jns_obat">Jenis Obat</label>
                        <input type="text" name="jns_obat" class="form-control @error('jns_obat') is-invalid @enderror" id="jns_obat" value="{{ old('jns_obat') }}" >
                        @error('jns_obat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" value="{{ old('stok') }}" >
                        @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div> --}}
                
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>    
            </div>
        </div>
    </div>
</div>

@endsection