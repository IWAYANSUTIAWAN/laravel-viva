@extends('layouts.master')
@section('content')
@section('title')
    Data Kondisi 
@endsection
 <div class="section-body">
     <div class="row">
         <div class="col-12 col-md-12 col-lg-12">
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah Data</button>
           <hr>
            @if (session('message'))               
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                     {{ session('message') }}
                </div>
            @endif
	{{-- <form action="{{ route('kondisi.cari') }}" method="GET">
		<input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
		<input type="submit" value="CARI">
    </form> --}}
    
            <table class="table table-striped table-bordered table-sm ">
                <tr>
                    <th style="width:5%;">No</th> 
                    <th style="width:50%;">Kondisi</th>
                    <th style="width:35%;" class="text-left">Action</th>
                </tr>
                 @foreach ($data as $no=> $datas)
                    <tr>
                       <td>{{ $data->firstItem()+$no }}</td>
                       <td>{{ $datas->kondisi }}</td>
                     
                       <td>
                          <a href="{{ route('Kondisi.edit',$datas->id) }}" class="badge badge-warning ">Edit</a> 
                           <a href="#" data-id="{{ $datas->id }}" class="badge badge-danger hapus">
                           <form action="{{ route('Kondisi_delete',$datas->id) }}" id="delete{{ $datas->id }}" method="post">
                                @csrf
                                @method('delete')
                            </form>  
                            Delete</a>
                           
                       </td>
                      </tr>
                      @endforeach
                      
            </table>
            <div class="row">
                <div class="col-md-6">
                     {{ $data->links() }}
                </div>
                <div class="col-md-6 text-right">
                     Halaman : {{ $data->currentPage() }} Dari {{ $data->total() }} |   Data Per Halaman : {{ $data->perPage() }}
                </div>
            </div>
            
        </div>
     </div>

</div>
    @section('modal')
        <div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Form tambah kondisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                            <form action="{{ route('kondisi.create') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kondisi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kondisi" class="form-control">
                                        @if($errors->has('kondisi'))
                                            <div class="error">{{ $errors->first('kondisi') }}</div>
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
          </div>
        </div>

    @endsection

    @section('pencarian')
       {{-- <form action="{{ route('kondisi.cari') }}" method="GET">
            <input class="form-control" name="cari" type="text" value="{{ old('cari') }}" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            
       </form> --}}
      
    @endsection

    @section('tombol-cetak')
        <a href="{{ route('kondisi.cetakpdf') }}" class="btn btn-primary btn-sm mr-1"><i class="fas fa-print"></i> Cetak Pdf</a>
        <a href="{{ route('kondisi.cetakexcel') }}" class="btn btn-primary btn-sm mr-1"><i class="fas fa-print"></i> Cetak Excel</a>
        
        <form action="{{ route('kondisi.cari') }}" method="GET">
            <input type="text"class="form-control" name="cari" placeholder="Cari data" value="{{ old('cari') }}">
            {{-- <input type="submit" value="CARI"> --}}
        </form>
    @endsection

@endsection

@push('page-scripts')
  {{-- <script src="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js') }}"></script> --}}
   <script src="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

    
@endpush

@push('after-scripts')
   <script>
      $(".hapus").click(function(e) {
          id=e.target.dataset.id;
         Swal.fire({
            title: 'Yakin akan Dihapus?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
            }).then((result) => {
            if (result.value) {
                 $(`#delete${id}`).submit();
                }
            })
        });

  </script>
@endpush

