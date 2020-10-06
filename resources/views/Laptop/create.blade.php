@extends('layouts.master')
@section('content')
@section('title')
   Tambah Data Laptop
@endsection
    <div class="row">
              <div class="col-12">
             <div class="card">
                <div class="card-body">
                    <form action="{{ route('laptop_store') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="vendor" class="form-control" value="{{ old('vendor') }}">
                                @if($errors->has('vendor'))
                                    <div class="error text-danger">{{ $errors->first('vendor') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipe</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="tipe" class="form-control" value="{{ old('tipe') }}">
                                @if($errors->has('tipe'))
                                    <div class="error text-danger">{{ $errors->first('tipe') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Serial Number</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="sn_laptop" class="form-control" value="{{ old('sn_laptop') }}">
                                @if($errors->has('sn_laptop'))
                                    <div class="error text-danger">{{ $errors->first('sn_laptop') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sistem Operasi</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="os" class="form-control" value="{{ old('os') }}">
                                @if($errors->has('os'))
                                    <div class="error text-danger">{{ $errors->first('os') }}</div>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Serial Number OS</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="sn_os" class="form-control" value="{{ old('sn_os') }}">
                                @if($errors->has('sn_os'))
                                    <div class="error text-danger">{{ $errors->first('sn_os') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pengguna</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="pengguna" class="form-control" value="{{ old('pengguna') }}">
                                @if($errors->has('pengguna'))
                                    <div class="error text-danger">{{ $errors->first('pengguna') }}</div>
                                @endif
                            </div>
                            
                        </div>
                        
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}">
                                @if($errors->has('keterangan'))
                                    <div class="error text-danger">{{ $errors->first('keterangan') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    @section('tombol-cetak')
    <a href="{{ route('laptop_index') }}" class="btn btn-icon icon-left btn-outline-info btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
   
    @endsection
   
@endsection

