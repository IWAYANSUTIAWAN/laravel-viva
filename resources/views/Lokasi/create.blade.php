@extends('layouts.master')
@section('content')
@section('title')
   Tambah Data Lokasi
@endsection
    <div class="row">
            <div class="col-12">
                <a href="{{ route('Lokasi_index') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-undo-alt"></i> Kembali</a>

                <div class="card">
                <div class="card-body">
                    <form action="{{ route('lokasi.create') }}" method="POST">
                        @csrf
                         <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
                            <div class="input-group col-sm-10 col-md-7">
                                <input type="text" name="kode" id="kode" value="{{ old('kode') }}" class="form-control"  readonly>
                                <input type="text" name="tipe" id="tipe" value="{{ old('tipe') }}" class="form-control" readonly>
                                <span class="input-group-button">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                
                                @if($errors->has('lokasi_id'))
                                    <div class="error text-danger">{{ $errors->first('lokasi_id') }}</div>
                                @endif
                            </div>
                            
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi ID</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="location_id" class="form-control" value="{{ old('location_id') }}">
                                @if($errors->has('location_id'))
                                    <div class="error text-danger">{{ $errors->first('location_id') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lokasi</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="location_name" class="form-control" value="{{ old('location_name') }}">
                                @if($errors->has('location_name'))
                                    <div class="error text-danger">{{ $errors->first('location_name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}">
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

 @section('modal')
        <div class="modal fade " tabindex="-1" role="dialog" id="modal">
            <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Pilih Lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-striped table-sm" id="table-1">
                    <thead class="thead-light">
                        <tr>
                            <th style="width:5%;">No</th>
                            <th>id</th>
                            <th>Kode Lokasi</th>
                            <th>Type Lokasi</th>
                        </tr>
                    </thead>
                   <tbody>
                     @foreach ($data as $no=> $datas)
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td>{{ $datas->Kodelokasi }}</td>
                            <td>{{ $datas->Tipelokasi }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" id="pilih"
                                data-id="{{ $datas->id }}"
                                data-kode="{{ $datas->Kodelokasi }}"
                                data-tipe="{{ $datas->Tipelokasi }}"
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
@endsection
@push('after-scripts')
   <script>
      $(document).ready(function(){
          $(document).on('click','#pilih',function(){
              var id= $(this).data('id')
              var kode= $(this).data('kode')
                var tipe=$(this).data('tipe')
              $('#id').val(id);
              $('#kode').val(kode);
              $('#tipe').val(tipe);
              $('#modal').modal('hide');
          })
      })
   </script>

@endpush