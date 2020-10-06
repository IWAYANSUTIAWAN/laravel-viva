@extends('layouts.master')
@section('content')
@section('title')
    Data Kamera Cctv
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
                <thead >
                    <tr>
                        <th style="width:5%;">No</th>
                        <th style="width:10%;">Merek</th>
                        <th style="width:15%;">Serial Number</th>
                        <th style="width:30%;">Lokasi</th>
                        <th style="width:20%;">Aksi</th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach ($data as $no=> $datas)
                    <tr>
                        <td>{{$no+1 }}</td>
                        <td>{{ $datas->merek}}</td>
                        <td>{{ $datas->sn }}</td>
                        <td>{{ $datas->location_name }}</td>
                        <td>
                            <a href="#" id="detail" class="badge badge-primary" data-toggle="modal" data-target="#modal_detail"
                                data-merek={{ $datas->merek }}
                                data-tipe={{ $datas->tipe }}
                                data-sn={{ $datas->sn }}
                                data-kondisi={{ $datas->kondisi }}
                                data-lokasi= {{ $datas->slug }}
                                data-jenis_cam={{ $datas->jenis_cam }}
                                data-keterangan={{ $datas->keterangan }}
                            >
                            <i class="fas fa-book-open"></i></a> 
                            <a href="{{ route('cctv_edit',$datas->id) }}" class="badge badge-warning">Ubah </a>
                            <a href="#" data-id="{{ $datas->id }}" class="badge badge-danger hapus">
                            <form action="{{ route('cctv_delete',$datas->id) }}" id="delete{{ $datas->id }}" method="post">
                                @csrf
                                @method('delete')
                            </form>  
                            Hapus </a>
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
                <h5 class="modal-title">Detail Kamera Cctv  </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body table-responsive">
                  <table class="table table-bordered ">
                    <tbody>
                        
                        <tr class=" table-bordered table-secondary">
                            <th style="width:5%;">Merek</th>
                            <td><span id="Merek"></span></td>
                        </tr>
                       
                        <tr class="table-bordered table-active">
                            <th style="width:5%;">Tipe</th>
                        <td><span id="Tipe"></span></td>
                        </tr>

                       <tr class=" table-bordered table-secondary">
                            <th style="width:5%;">Serial Number</th>
                        <td><span id="SN"></span></td>
                       </tr>

                       <tr class="table-bordered table-active">
                            <th style="width:5%;">Kondisi</th>
                        <td><span id="Kondisi"></span></td>
                       </tr>

                        <tr class=" table-bordered table-secondary">
                            <th style="width:5%;">Lokasi</th>
                        <td><span id="Lokasi"></span></td>
                       </tr>

                       <tr class="table-bordered table-active">
                            <th style="width:25%;">Jenis Kamera</th>
                        <td><span id="Jenis_cam"></span></td>
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
        <a href="{{ route('cctv_create') }}" class="btn btn-icon btn-sm icon-left btn-primary mr-1"><i class="fas fa-plus"></i> Tambah Data</a>
        <a href="{{ route('cctv_cetakpdf') }}" class="btn btn-primary btn-sm mr-1"><i class="fas fa-print"></i> Cetak Pdf</a>
        <a href="{{ route('cctv_cetakexcel') }}" class="btn btn-primary btn-sm mr-1"><i class="fas fa-print"></i> Cetak Excel</a>
    @endsection

@endsection

@push('page-scripts')
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
                var merek = $(this).data('merek'); //->$(this).data('merek') merek ini diambil dari data merek di tombol detail
                var tipe = $(this).data('tipe');
                var sn =$(this).data('sn');
                var kondisi =$(this).data('kondisi');
                var lokasi =$(this).data('lokasi');
                var jenis_cam =$(this).data('jenis_cam');
                var keterangan =$(this).data('keterangan');
                $('#Merek').text(merek); ///-> $('#Merek') diambil dari data span didalam modal
                $('#Tipe').text(tipe);
                $('#SN').text(sn);
                $('#Kondisi').text(kondisi);
                $('#Lokasi').text(lokasi);
                $('#Jenis_cam').text(jenis_cam);
                $('#Keterangan').text(keterangan);
            })
        })
    </script>

@endpush