@extends('layouts.master')
@section('content')
@section('title')
    Edit Data Teamviewer
@endsection
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="card-body">
                <form action="{{ route('tv_update',$datas->id) }}" method="POST">
                    @csrf
                    @method('patch')
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
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">ID Teamviewer</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="kode_id" class="form-control" 
                                @if(old('kode_id'))
                                    value="{{ old('kode_id') }}" 
                                @else
                                    value="{{ $datas->kode_id }}"
                                @endif
                                >
                                @if($errors->has('kode_id'))
                                    <div class="error text-danger">{{ $errors->first('kode_id') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="password" class="form-control" 
                                @if(old('password'))
                                    value="{{ old('password') }}" 
                                @else
                                    value="{{ $datas->password }}"
                                @endif
                                >
                                @if($errors->has('password'))
                                    <div class="error text-danger">{{ $errors->first('password') }}</div>
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
    <a href="{{ route('tv_index') }}" class="btn btn-icon icon-left btn-outline-info btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
@endsection

@section('modal')
        <div class="modal fade " tabindex="-1" role="dialog" id="modal_update">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
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