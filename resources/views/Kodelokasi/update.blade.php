@extends('layouts.master')
@section('content')
@section('title')
    Edit Data 
@endsection
 <div class="row">
       
        <div class="col-12">
           <div class="row">

               <div class="card-body">
                  <form action="{{ route('kodelokasi_update',$datas->id) }}" method="POST">
                    @csrf
                    @method('patch')
                         <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipe Lokasi</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="Tipelokasi" class="form-control"
                                  @if(old('Tipelokasi'))
                                    value="{{ old('Tipelokasi') }}" 
                                @else
                                    value="{{ $datas->Tipelokasi }}"
                                @endif
                                 >
                                @if($errors->has('Tipelokasi'))
                                    <div class="error text-danger">{{ $errors->first('Tipelokasi') }}</div>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Lokasi</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="Kodelokasi" class="form-control" 
                                 @if(old('Kodelokasi'))
                                    value="{{ old('Kodelokasi') }}" 
                                @else
                                    value="{{ $datas->Kodelokasi }}"
                                @endif
                                >
                                @if($errors->has('Kodelokasi'))
                                    <div class="error text-danger">{{ $errors->first('Kodelokasi') }}</div>
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
                  </form>
            </div>
               
           </div>
         </div>
     </div>
    @section('tombol-cetak')
     <a href="{{ route('kodelokasi_index') }}" class="btn btn-icon icon-left btn-outline-info btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
    @endsection

@endsection
