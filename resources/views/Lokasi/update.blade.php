@extends('layouts.master')
@section('content')
@section('title')
   Update Data Lokasi
@endsection
    <div class="row">
              <div class="col-12">
                  <a href="{{ route('Lokasi_index') }}" class="btn btn-icon icon-left btn-primary"><< Kembali</a>
            <hr>
                <div class="card">
                <div class="card-body">
                    <form action="{{ route('lokasi.update',$datas->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi ID</label>
                            
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="location_id" class="form-control" 
                                 @if(old('location_id'))
                                            value="{{ old('location_id') }}" 
                                        @else
                                            value="{{ $datas->location_id }}"
                                        @endif
                                >
                                @if($errors->has('location_id'))
                                    <div class="error text-danger">{{ $errors->first('location_id') }}</div>
                                @endif
                            </div>

                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lokasi</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="location_name" class="form-control" 
                               @if(old('location_name'))
                                    value="{{ old('location_name') }}" 
                                @else
                                    value="{{ $datas->location_name }}"
                                   
                                @endif
                                >
                                @if($errors->has('location_name'))
                                    <div class="error text-danger">{{ $errors->first('location_name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            
                            <div class="col-sm-12 col-md-7">
                                <input type="hidden" name="slug" class="form-control" value="{{ $datas->slug }}">
                               
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="alamat" class="form-control" 
                               @if(old('location_id'))
                                    value="{{ old('alamat') }}" 
                                @else
                                    value="{{ $datas->alamat }}"
                                @endif
                                >
                                @if($errors->has('alamat'))
                                    <div class="error text-danger">{{ $errors->first('alamat') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                    
                  </div>
                </div>
              </div>
            </div>
@endsection