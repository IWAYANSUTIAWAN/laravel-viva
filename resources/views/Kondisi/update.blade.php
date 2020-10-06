@extends('layouts.master')
@section('content')
@section('title')
    Edit Data Kondisi
@endsection
 <div class="row">
        <a href="{{ route('Kondisi_index') }}" class="btn btn-icon icon-left btn-outline-info btn-sm"><< Kembali</a>
        <div class="col-12">
           <div class="row">

               <div class="card-body">
                  <form action="{{ route('Kondisi.update',$data->id) }}" method="POST">
                    @csrf
                    @method('patch')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                     @error('region')
                                        class="text-danger"
                                    @enderror >Kondisi
                                        @error('region')
                                            | {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kondisi" 
                                        @if(old('kondisi'))
                                            value="{{ old('kondisi') }}" 
                                        @else
                                            value="{{ $data->kondisi }}"
                                        @endif
                                    class="form-control">
                                    </div>
                                    
                                </div>
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