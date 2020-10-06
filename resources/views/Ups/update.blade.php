@extends('layouts.master')
@section('content')
@section('title')
    Edit Data ups
@endsection
 <div class="row">
       
        <div class="col-12">
           <div class="row">

               <div class="card-body">
                  <form action="{{ route('ups_update',$datas->id) }}" method="POST">
                    @csrf
                    @method('patch')
                         <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Merek</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="merek" class="form-control"
                                  @if(old('merek'))
                                    value="{{ old('merek') }}" 
                                @else
                                    value="{{ $datas->merek }}"
                                @endif
                                 >
                                @if($errors->has('merek'))
                                    <div class="error text-danger">{{ $errors->first('merek') }}</div>
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
                                <input type="text" name="sn" class="form-control"
                                @if(old('sn'))
                                    value="{{ old('sn') }}" 
                                @else
                                    value="{{ $datas->sn }}"
                                @endif
                                 >
                                @if($errors->has('sn'))
                                    <div class="error text-danger">{{ $errors->first('sn') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
                            <div class="input-group col-sm-12 col-md-7">
                                 <input type="text" name="lokasi_name" id="lokasi_name" class="form-control"
                                    value="{{ $datas->location_name }}" readonly>
                                <input type="text" name="lokasi_id" id="lokasi_id" class="form-control"
                                    value="{{ $datas->lokasi_id }}" readonly>

                                @if($errors->has('lokasi_id'))
                                    <div class="error text-danger">{{ $errors->first('lokasi_id') }}</div>
                                @endif

                                <span class="input-group-button">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal_update">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kondisi</label>
                            <div class="col-sm-12 col-md-7">
                               
                                <select class="form-control" id="" name="kondisi">
                                     <option>{{ $datas->kondisi }}</option>
                                     @foreach ($kondisi as $no=> $datax)
                                        <option value="{{  $datax->kondisi }}">{{ $datax->kondisi }}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>
                          <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Region</label>
                            <div class="col-sm-12 col-md-7">
                               
                                <select class="form-control" id="" name="region" >
                                     <option value="{{ $datas->region }}">{{ $datas->region }}</option>
                                     @foreach ($region as $no=> $reg)
                                        <option value="{{  $reg->region }}">{{ $reg->region }}</option>
                                     @endforeach
                                </select>
                                 @if($errors->has('region'))
                                    <div class="error text-danger">{{ $errors->first('region') }}</div>
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
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tegangan</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="tegangan" class="form-control"
                                 @if(old('tegangan'))
                                    value="{{ old('tegangan') }}" 
                                @else
                                    value="{{ $datas->tegangan }}"
                                @endif
                                 >
                                @if($errors->has('tegangan'))
                                    <div class="error text-danger">{{ $errors->first('tegangan') }}</div>
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
                  </form>
            </div>
               
           </div>
         </div>
     </div>
    @section('tombol-cetak')
     <a href="{{ route('ups_index') }}" class="btn btn-icon icon-left btn-outline-info btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
    @endsection

 @section('modal')
        <div class="modal fade " tabindex="-1" role="dialog" id="modal_update">
          <div class="modal-dialog modal-xl modal-dialog-scrollable " role="document">
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
                            <th>Lokasi</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $no=> $result)
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td>{{ $result->location_name }}</td>
                            <td>{{ $result->alamat }}</td>
                            <td>
                                <button class="btn btn-primary btn-xs" id="pilih"
                                    data-id="{{ $result->location_id }}"
                                    data-name="{{ $result->location_name }}">
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
              $('#modal_update').modal('hide');
          })
      })
   </script>
   
@endpush