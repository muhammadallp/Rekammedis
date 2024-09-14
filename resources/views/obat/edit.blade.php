@extends('layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Obat</h6>
            </div>
            <div class="card-body">
                
                <form method="post" action="/obat/{{ $obat->id }}">
                    @method('put')
                    @csrf
                
                    <div class="form-group">
                        <label for="nohp">Nama Obat</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $obat->nama }}" >
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jns_obat">Jenis Obat</label>
                        <input type="text" name="jns_obat" class="form-control @error('jns_obat') is-invalid @enderror" id="jns_obat" value="{{ $obat->jns_obat }}" >
                        @error('jns_obat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" value="{{ $obat->stok }}" >
                        @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_obat">Harga Perobat</label>
                        <input type="number" name="harga_obat" class="form-control @error('harga_obat') is-invalid @enderror" id="harga_obat" value="{{ $obat->harga_obat }}" >
                        @error('harga_obat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </form>    
            </div>
        </div>
    </div>
</div>

@endsection