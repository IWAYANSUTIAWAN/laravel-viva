@extends('layouts.master')
@section('content')
@section('title')
Tambah Data
@endsection
    <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('kodelokasi_store') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipe Lokasi</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="Tipelokasi" class="form-control"  value="{{ old('Tipelokasi') }}">
                                @if($errors->has('Tipelokasi'))
                                <div class="error text-danger">{{ $errors->first('Tipelokasi') }}</div>
                                @endif
                                <label for="" class="text-muted">Masukkan tipe: office-bali, warehouse-bali, Apotek, dll</label>
                            
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Lokasi</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="Kodelokasi" class="form-control" value="{{ old('kodelokasi') }}">
                                @if($errors->has('Kodelokasi'))
                                <div class="error text-danger">{{ $errors->first('Kodelokasi') }}</div>
                                @endif
                                <label for="" class="text-muted">masukkan huruf nama depan dan belakang: office-bali=OB, warehouse-bali=WB, Apotek=A</label>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
                            </div>
                        </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    @section('tombol-cetak')
        <a href="{{ route('kodelokasi_index') }}" class="btn btn-icon icon-left btn-outline-info btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
    @endsection
@endsection

