@extends('layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
            </div>
            <div class="card-body">
                
                <form method="post" action="/ruangan/{{ $ruangan->id }}">
                    @method('put')
                    @csrf
                
                    <div class="form-group">
                        <label for="nohp">Nama Ruangan</label>
                        <input type="text" name="ruangan" class="form-control @error('ruangan') is-invalid @enderror" id="ruangan" value="{{ $ruangan->ruangan }}" >
                        @error('ruangan')
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