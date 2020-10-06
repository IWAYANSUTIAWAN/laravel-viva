@extends('layouts.master')
@section('content')
@section('title')
    Edit Data laptop
@endsection
<div class="row">
        <div class="col-12">
            <div class="row">
                <div class="card-body">
                    <form action="{{ route('laptop_update',$datas->id) }}" method="POST">
                        @csrf
                        @method('patch')
                            <div class="form-group row mb-2">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="vendor" class="form-control"
                                    @if(old('vendor'))
                                        value="{{ old('vendor') }}" 
                                    @else
                                        value="{{ $datas->vendor }}"
                                    @endif
                                    >
                                    @if($errors->has('vendor'))
                                        <div class="error text-danger">{{ $errors->first('vendor') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipe</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="tipe" class="form-control" 
                                    @if(old('tipe'))
                                        value="{{ old('tipe') }}" 
                                    @else
                                        value="{{ $datas->tipe }}"
                                    @endif
                                    >
                                    @if($errors->has('tipe'))
                                        <div class="error text-danger">{{ $errors->first('tipe') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Serial Number</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="sn_laptop" class="form-control"
                                    @if(old('sn_laptop'))
                                        value="{{ old('sn_laptop') }}" 
                                    @else
                                        value="{{ $datas->sn_laptop }}"
                                    @endif
                                    >
                                    @if($errors->has('sn_laptop'))
                                        <div class="error text-danger">{{ $errors->first('sn_laptop') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sistem Operasi</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="os" class="form-control"
                                    @if(old('os'))
                                        value="{{ old('os') }}" 
                                    @else
                                        value="{{ $datas->os }}"
                                    @endif
                                    >
                                    @if($errors->has('os'))
                                        <div class="error text-danger">{{ $errors->first('os') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Serial Number OS</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="sn_os" class="form-control"
                                    @if(old('sn_os'))
                                        value="{{ old('sn_os') }}" 
                                    @else
                                        value="{{ $datas->sn_os }}"
                                    @endif
                                    >
                                    @if($errors->has('sn_os'))
                                        <div class="error text-danger">{{ $errors->first('sn_os') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pengguna</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="pengguna" class="form-control"
                                    @if(old('pengguna'))
                                        value="{{ old('pengguna') }}" 
                                    @else
                                        value="{{ $datas->pengguna }}"
                                    @endif
                                    >
                                    @if($errors->has('pengguna'))
                                        <div class="error text-danger">{{ $errors->first('pengguna') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="keterangan" class="form-control"
                                    @if(old('keterangan'))
                                        value="{{ old('keterangan') }}" 
                                    @else
                                        value="{{ $datas->keterangan }}"
                                    @endif
                                    >
                                    @if($errors->has('keterangan'))
                                        <div class="error text-danger">{{ $errors->first('keterangan') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Update</button>
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

