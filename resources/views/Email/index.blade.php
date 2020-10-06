@extends('layouts.master')
@section('content')
@section('title')
    Data email
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
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead >
                        <tr>
                            <th style="width:5%;">No</th>
                            <th style="width:10%;">Gmail</th>
                            <th style="width:15%;">Zimbra</th>
                            <th style="width:15%;">Dropbox</th>
                            <th style="width:30%;">Lokasi</th>
                            <th style="width:20%;">Aksi</th>
                        </tr>
                    </thead>
                     @foreach ($data as $no=> $datas)
                     <tbody>
                        <tr>
                           <td>{{ $no+1 }}</td>
                           <td>{{ $datas->gmail}}</td>
                           <td>{{ $datas->zimbra }}</td>
                           <td>{{ $datas->dropbox }}</td>
                           <td>{{ $datas->location_name }}</td>
                         
                           <td>
                               <a href="#" id="detail" class="badge badge-primary" data-toggle="modal" data-target="#modal_detail"
                              
                               data-gmail={{ $datas->gmail }}
                               data-zimbra={{ $datas->zimbra }}
                               data-dropbox={{ $datas->dropbox }}
                               data-lokasi= {{ $datas->slug }}
                              >
                                   <i class="far fa-clipboard"></i></a> 
                               <a href="{{ route('email_edit',$datas->id) }}" class="badge badge-warning">Ubah </a>
                               <a href="#" data-id="{{ $datas->id }}" class="badge badge-danger hapus">
                               <form action="{{ route('email_delete',$datas->id) }}" id="delete{{ $datas->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>  
                                Hapus </a>
                                 
                           </td>
                        </tr>
    
                        </tbody>
                     @endforeach
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
                <h5 class="modal-title">Detail email  </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body table-responsive">
                  <table class="table table-bordered ">
                    <tbody>
                        
                        <tr class=" table-bordered table-secondary">
                            <th style="width:5%;">Gmail</th>
                            <td><span id="Gmail"></span></td>
                        </tr>
                       
                        <tr class="table-bordered table-active">
                            <th style="width:5%;">Zimbra</th>
                        <td><span id="Zimbra"></span></td>
                        </tr>

                       <tr class=" table-bordered table-secondary">
                            <th style="width:5%;">Dropbox</th>
                        <td><span id="Dropbox"></span></td>
                       </tr>

                       
                        <tr class=" table-bordered table-secondary">
                            <th style="width:5%;">Lokasi</th>
                        <td><span id="Lokasi"></span></td>
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
    <a href="{{ route('email_create') }}" class="btn btn-icon btn-sm icon-left btn-primary mr-1"><i class="fas fa-plus"></i> Tambah Data</a>
    <a href="{{ route('email_cetakpdf') }}" class="btn btn-primary btn-sm mr-1"><i class="fas fa-print"></i> Cetak Pdf</a>
    <a href="{{ route('email_cetakexcel') }}" class="btn btn-primary btn-sm mr-1"><i class="fas fa-print"></i> Cetak Excel</a>
  
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
                var gmail = $(this).data('gmail'); //->$(this).data('merek') merek ini diambil dari data merek di tombol detail
                var zimbra = $(this).data('zimbra');
                var dropbox =$(this).data('dropbox');
               var lokasi =$(this).data('lokasi');
               
                $('#Gmail').text(gmail); ///-> $('#Merek') diambil dari data span didalam modal
                $('#Zimbra').text(zimbra);
                $('#Dropbox').text(dropbox);
                $('#Lokasi').text(lokasi);
               })
       })
   </script>
   
  
@endpush