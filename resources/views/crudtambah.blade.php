@extends('layouts.master')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="row">
               <div class="card-body">
                  <form action="{{ route('crud.simpan') }}" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label @error('kode_barang')
                                        class="text-danger"
                                    @enderror>Kode Barang
                                        @error('kode_barang')
                                            | {{ $message }}
                                        @enderror
                                    </label>
                                    <input type="text" name="kode_barang" value="{{ old('kode_barang') }}" class="form-control">
                                </div>
                            </div>
                         </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <label @error('nama_barang')
                                            class="text-danger"
                                             @enderror>Nama Barang
                                            @error('nama_barang')
                                                | {{ $message }}
                                            @enderror
                                     </label>
                                        <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        <div class="card-footer text-right">
                          <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        </div>
                  </form>
            </div>
               
           </div>
         </div>
     </div>

</div>
@endsection