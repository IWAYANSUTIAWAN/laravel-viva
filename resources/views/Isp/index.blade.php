@extends('layouts.master')
@section('content')
@section('title')
    Daftar Isp
@endsection
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            @if (session('message'))               
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('message') }}
                </div>
            @endif        
            <div class="table-responsive">
                <table class="table table-striped table-sm" id="table-1">
                    <thead>
                        <tr>
                            <th style="width:5%;">No</th>
                            <th style="width:25%;">Lokasi</th>
                            <th style="width:13%;">Nomor Internet</th>
                            <th style="width:10%;">Kecepatan</th>
                            <th style="width:15%;">Status</th>
                            <th style="width:13%;">Nomor Telpon</th> 
                            <th style="width:20%;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                        <tbody>          
                        @foreach ($data as $no=> $datas)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $datas->location_name }}</td>
                                <td>{{ $datas->nomor_inet}}</td>
                                <td>{{ $datas->kecepatan }}</td>
                                <td>{{ $datas->status }}</td>
                                <td>{{ $datas->nomor_tlp}}</td>                     
                                <td>
                                    <a href="#" id="detail" class="btn btn-danger btn-action" data-toggle="modal" title="Detail" data-target="#modal_detail"
                                    
                                    data-nomor_tlp={{ $datas->nomor_tlp }}
                                    data-nomor_inet={{ $datas->nomor_inet }}
                                    data-kecepatan={{ $datas->kecepatan }}
                                    data-status={{ $datas->status }}
                                    data-region={{ $datas->region }}
                                    data-lokasi= {{ $datas->slug }}
                                    data-keterangan={{ $datas->keterangan }}
                                        
                                    >
                                        <i class="far fa-clipboard"></i></a> 
                                    {{-- <a href="{{ route('isp_edit',$datas->id) }}" class="badge badge-warning">Ubah </a> --}}
                                    <a href="{{ route('isp_edit',$datas->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" data-id="{{ $datas->id }}" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete">
                                    <form action="{{ route('isp_delete',$datas->id) }}" id="delete{{ $datas->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>  
                                        <i class="fas fa-trash"></i></a>
                                        
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('modal')
    <div class="modal fade " tabindex="-1" role="dialog" id="modal_detail">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Detail   </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered ">
                        <tbody>
                        <tr class=" table-bordered table-secondary">
                            <th style="width:5%;">Nomor Telpon</th>
                            <td><span id="nomor_tlp"></span></td>
                        </tr>
                       
                        <tr class="table-bordered table-active">
                            <th style="width:5%;">Nomor Internet</th>
                        <td><span id="nomor_inet"></span></td>
                        </tr>

                       <tr class=" table-bordered table-secondary">
                            <th style="width:5%;">Kecepatan</th>
                        <td><span id="kecepatan"></span></td>
                       </tr>

                       <tr class="table-bordered table-active">
                            <th style="width:5%;">Status</th>
                        <td><span id="status"></span></td>
                       </tr>

                        <tr class=" table-bordered table-secondary">
                            <th style="width:5%;">Lokasi</th>
                        <td><span id="Lokasi"></span></td>
                       </tr>

                       <tr class="table-bordered table-active">
                            <th style="width:25%;">Region</th>
                        <td><span id="Region"></span></td>
                       </tr>

                       <tr class=" table-bordered table-secondary">
                            <th style="width:5%;">Keterangan</th>
                        <td><span id="Keterangan"></span></td>
                       </tr>
                    </tbody>
                  </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
      
@endsection
  @section('tombol-cetak')
    <a href="{{ route('isp_create') }}" class="btn btn-icon btn-sm icon-left btn-primary mr-1"><i class="fas fa-plus"></i> Tambah Data</a>
    <a href="{{ route('isp_cetakpdf') }}" class="btn btn-primary btn-sm mr-1"><i class="fas fa-print"></i> Cetak Pdf</a>
    <a href="{{ route('isp_cetakexcel') }}" class="btn btn-primary btn-sm mr-1"><i class="fas fa-print"></i> Cetak Excel</a>
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
     <script>
       $(document).ready(function(){
           $(document).on('click','#detail',function(){
                var nomor_tlp = $(this).data('nomor_tlp'); //->$(this).data('merek') merek ini diambil dari data merek di tombol detail
                var nomor_inet = $(this).data('nomor_inet');
                var kecepatan = $(this).data('kecepatan');
                var status =$(this).data('status');
                var keterangan =$(this).data('keterangan');
                var region =$(this).data('region');
                var lokasi =$(this).data('lokasi');
               $('#nomor_tlp').text(nomor_tlp); ///-> $('#Merek') diambil dari data span didalam modal
                $('#nomor_inet').text(nomor_inet);
                $('#kecepatan').text(kecepatan);
                $('#status').text(status);
                $('#keterangan').text(keterangan);
                $('#Region').text(region);
                $('#Lokasi').text(lokasi);
            })
       })
   </script>
   
@endpush