@extends('layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Data</h6>
            </div>
            <div class="card-body">
                
                <form method="post" action="/poli/{{ $poli->id }}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="poli">Poli</label>
                        <input type="text" name="poli" class="form-control @error('poli') is-invalid @enderror" id="poli" value="{{ $poli->poli }}" >
                        @error('poli')
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