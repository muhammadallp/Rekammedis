@extends('layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
            </div>
            <div class="card-body">
                
                <form method="post" action="/rekammedis/">
                    @csrf
                    <div class="form-group">
                        <label for="jk">Pasien</label>
                        <select class="form-control" name="id_pasien" id="poli">
                            <option selected disabled> Silahkan Pilih Nama Pasien</option>
                            @foreach($pasien as $pl)
                            <option value="{{ $pl->id }}" >{{ $pl->nama_pasien }}</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="ruangan">Ruangan</label>
                        <select class="form-control" name="id_ruangan" id="poli">
                            <option selected disabled> Silahkan Pilih  Ruangan</option>
                            @foreach($ruangan as $pl)
                            <option value="{{ $pl->id }}" >{{ $pl->ruangan }}</option>
                            @endforeach
                        </select>
                      </div>

                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <input type="text" name="keluhan" class="form-control @error('keluhan') is-invalid @enderror" id="keluhan" value="{{ old('keluhan') }}" >
                        @error('keluhan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                   
                    <div class="form-group">
                        <label for="class">Kelas</label>
                        <input type="text" name="class" class="form-control @error('class') is-invalid @enderror" id="class" value="{{ old('class') }}" >
                        @error('class')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <input type="hidden" name="status" value="0">
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>    
            </div>
        </div>


        <!-- resources/views/formulir.blade.php -->

    
    </div>
</div>


@endsection