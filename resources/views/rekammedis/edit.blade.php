@extends('layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
            </div>
            <div class="card-body">
                
                <form method="post" action="/rekammedis/{{ $rekammedis->id }}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror"  id="nip" value="{{ $rekammedis->nip }}"  disabled readonly>
                        @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nohp">Nama</label>
                        <input type="text" name="nama_pasien" class="form-control @error('nama_pasien') is-invalid @enderror" id="nama_pasien" value="{{ $rekammedis->nama_pasien }}" disabled readonly >
                        @error('nama_pasien')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                     
                    <div class="form-group">
                        <label for="diagnosa">Diagnosa</label>
                        <input type="text" name="diagnosa" class="form-control @error('diagnosa') is-invalid @enderror" id="diagnosa" value="{{ old('diagnosa') }}" >
                        @error('diagnosa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <input type="hidden" name="id_rekam" value="{{ $rekammedis->id }}"> 

                    <div id="input-container"  class=" row g-1">
                        <div  class="form-group col-sm-10 col-md-10 mt-3">
                                <select class="form-control" name="id_obat[]" id="obat">
                                    <option selected disabled> Silahkan Pilih Obat</option>
                                    @foreach($obat as $pl)
                                    <option value="{{ $pl->id }}" >{{ $pl->nama }}</option>
                                    @endforeach
                                </select>
                                <div class="row">
                                <div class="form-group col-lg-3 mt-3">
                                    <label for="jml_obat">Jumlah Obat</label>
                                    <input type="text" name="jml_obat[]" class="form-control"  id="jml_obat"  >
                                </div>
                                <div class="form-group col-lg-3 mt-3">
                                    <label for="tipe_obat">Jenis Obat</label>
                                    <input type="text" class="form-control" id="tipe_obat" readonly>
                                </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan[]" class="form-control"  id="keterangan"  >
                                </div>
                          </div>
                              <div class="col-1 col-md-0 mt-3">
                                  <button type="button" id="add-input" class="btn btn-primary"> <i class="fas fa-plus "></i></button>
                              </div>
                        </div>
                  
                        <div class="form-group">
                            <label for="diagnosa">Tindakan</label>
                            <input type="text" name="tindakan" class="form-control @error('tindakan') is-invalid @enderror" id="tindakan" value="{{ old('tindakan') }}" >
                            @error('tindakan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    <input type="hidden" name="id_dokter" value="{{ auth()->user()->id }}">
                   <input type="hidden" name="status" value="1">
                   
                    <button type="submit" class="btn btn-primary">Proses</button>
                </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to fetch and set the obat type
            function fetchObatType(obatID, targetInput) {
                if (obatID) {
                    $.ajax({
                        url: '/get-obat-type/' + obatID,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $(targetInput).val(data.jns_obat);
                        }
                    });
                } else {
                    $(targetInput).val('');
                }
            }

            // Handle the addition of new input fields
            $('#add-input').on('click', function() {
                var newInput = `
                    <div class="form-group col-sm-10 col-md-10 mt-3">
                        <select class="form-control obat-select" name="id_obat[]">
                            <option selected disabled> Silahkan Pilih Obat</option>
                            @foreach($obat as $pl)
                                <option value="{{ $pl->id }}">{{ $pl->nama }}</option>
                            @endforeach
                        </select>
                        <div class="row">
                            <div class="form-group col-lg-3 mt-3">
                                <label for="jml_obat">Jumlah Obat</label>
                                <input type="text" name="jml_obat[]" class="form-control">
                            </div>
                            <div class="form-group col-lg-3 mt-3">
                                <label for="tipe_obat">Jenis Obat</label>
                                <input type="text" class="form-control tipe-obat-input" name="tipe_obat[]" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan[]" class="form-control">
                        </div>
                    </div>
                `;
                $('#input-container').append(newInput);
            });

            // Delegate event to dynamically added elements
            $(document).on('change', '.obat-select', function() {
                var obatID = $(this).val();
                var targetInput = $(this).closest('.form-group').find('.tipe-obat-input');
                fetchObatType(obatID, targetInput);
            });

            // Initial binding for existing select element
            $('#obat').on('change', function() {
                var obatID = $(this).val();
                var targetInput = $('#tipe_obat');
                fetchObatType(obatID, targetInput);
            });
        });
    </script>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </div>
</div>


@endsection