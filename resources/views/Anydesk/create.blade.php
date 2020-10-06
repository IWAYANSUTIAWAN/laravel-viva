@extends('layouts.master')
@section('content')
@section('title')
   Tambah Data Anydesk
@endsection
    <div class="row">
              <div class="col-12">
             <div class="card">
                <div class="card-body">
                    <form action="{{ route('anydesk_store') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
                            <div class="input-group col-sm-10 col-md-7">
                                <input type="text" name="lokasi_name" id="lokasi_name" class="form-control" value="{{ old('lokasi_id') }}" readonly>
                                <input type="text" name="lokasi_id" id="lokasi_id" class="form-control" readonly>
                                <span class="input-group-button">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal_anydesk">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                
                                @if($errors->has('lokasi_id'))
                                    <div class="error text-danger">{{ $errors->first('lokasi_id') }}</div>
                                @endif
                            </div>
                            
                        </div>
                        
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">ID Anydesk</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="kode_id" class="form-control" value="{{ old('kode_id') }}">
                                @if($errors->has('kode_id'))
                                    <div class="error text-danger">{{ $errors->first('kode_id') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="password" class="form-control" value="{{ old('password') }}">
                                @if($errors->has('password'))
                                    <div class="error text-danger">{{ $errors->first('password') }}</div>
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
    @section('modal')
            <div class="modal fade " tabindex="-1" role="dialog" id="modal_anydesk">
                <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pilih Lokasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width:5%;">No</th>
                                        <th style="width:20%;">Lokasi</th>
                                        <th style="width:20%;">Alamat</th>
                                        <th style="width:20%;">Aksi</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    @foreach ($data as $no=> $datas)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td>{{ $datas->location_name }}</td>
                                        <td>{{ $datas->alamat }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" id="pilih"
                                            data-id="{{ $datas->location_id }}"
                                            data-name="{{ $datas->location_name }}"
                                            >
                                            <i class="fa fa-check"> Pilih</i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    
        @section('tombol-cetak')
        <a href="{{ route('anydesk_index') }}" class="btn btn-icon icon-left btn-outline-info btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
    
        @endsection
    
    @endsection
@push('after-scripts')
   <script>
      $(document).ready(function(){
          $(document).on('click','#pilih',function(){
              var location_id= $(this).data('id')
              var location_name= $(this).data('name')

              $('#lokasi_id').val(location_id);
              $('#lokasi_name').val(location_name);
              $('#modal_anydesk').modal('hide');
          })
      })
   </script>
@endpush
