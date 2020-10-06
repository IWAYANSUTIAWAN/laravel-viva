@extends('layouts.master')
@section('content')
@section('title')
   Tambah Data Region
@endsection
    <div class="row">
              <div class="col-12">
                  <a href="{{ route('Region_index') }}" class="btn btn-icon icon-left btn-primary"><< Kembali</a>
            <hr>
                <div class="card">
                <div class="card-body">
                    <form action="{{ route('region.create') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Region</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="region" class="form-control">
                                @if($errors->has('region'))
                                    <div class="error">{{ $errors->first('region') }}</div>
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