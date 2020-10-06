@extends('layouts.master')
@section('content')
@section('title')
    Data Lokasi
@endsection
 <div class="section-body">
     <div class="row">
         <div class="col-12 col-md-12 col-lg-12">
            {{-- <a href="{{ route('Lokasi_tambah') }}" class="btn btn-icon btn-sm icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data</a> --}}
            <hr>
            @if (session('message'))               
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                     {{ session('message') }}
                </div>
            @endif

            <table class="table table-striped table-bordered table-sm">
                
                <thead >
                    <tr>
                        <th style="width:5%;">No</th>
                        <th style="width:10%;">Location ID</th>
                        <th>Nama Lokasi</th>
                        <th style="width:40%;">Alamat</th>
                        <th style="width:20%;">Aksi</th>
                    </tr>
                </thead>
                 @foreach ($data as $no=> $datas)
                 <tbody>
                    <tr>
                       <td>{{ $data->firstItem()+$no }}</td>
                       <td>{{ $datas->location_id }}</td>
                       <td>{{ $datas->location_name }}</td>
                       <td>{{ $datas->alamat }}</td>
                     
                       <td>
                           <a href="{{ route('lokasi.edit',$datas->id) }}" class="badge badge-warning">Ubah </a> 
                          <a href="#" data-id="{{ $datas->id }}" class="badge badge-danger hapus">
                           <form action="{{ route('lokasi_delete',$datas->id) }}" id="delete{{ $datas->id }}" method="post">
                                @csrf
                                @method('delete')
                            </form>  
                            Hapus</a>
                       </td>
                    </tr>

                    </tbody>
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

   {{-- @section('pencarian')
       <form action="{{ route('lokasi.cari') }}" method="GET">
            <input class="form-control" name="cari" type="text" value="{{ old('cari') }}" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            
       </form>
    @endsection --}}

   @section('tombol-cetak')
    <a href="{{ route('Lokasi_tambah') }}" class="btn btn-icon btn-sm icon-left btn-primary mr-1"><i class="fas fa-plus"></i> Tambah Data</a>
        <a href="{{ route('lokasi.cetakpdf') }}" class="btn btn-primary btn-sm mr-1"><i class="fas fa-print"></i> Cetak Pdf</a>
        <a href="{{ route('lokasi.cetakexcel') }}" class="btn btn-primary btn-sm mr-1"><i class="fas fa-print"></i> Cetak Excel</a>
        <form action="{{ route('lokasi.cari') }}" method="GET">
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
            text: "Data tidak bisa dikembalikan Setelah dihapus",
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