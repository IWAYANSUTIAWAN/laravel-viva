@extends('layouts.master')
@section('content')
    @section('title')
        Daftar Anydesk
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
                            <th style="width:25%;">Lokasi</th>
                            <th style="width:15%;">ID Anydesk</th>
                            {{-- <th style="width:10%;">password</th> --}}
                            <th style="width:15%;">Pengguna</th>
                            <th style="width:20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $no=> $datas)
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td>{{ $datas->location_name }}</td>
                            <td>{{ $datas->kode_id }}</td>
                            <td><div class="badge badge-success">{{ $datas->pengguna }}</div></td>
                            <td>
                                <a href="{{ route('anydesk_edit',$datas->id) }}" class="badge badge-warning">Ubah </a> 
                                <a href="#" data-id="{{ $datas->id }}" class="badge badge-danger hapus">
                            <form action="{{ route('anydesk_delete',$datas->id) }}" id="delete{{ $datas->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>  
                                Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('tombol-cetak')
    <a href="{{ route('anydesk_create') }}" class="btn btn-icon btn-sm icon-left btn-primary mr-1"><i class="fas fa-plus"></i> Tambah Data</a>
    <a href="{{ route('anydesk_cetakpdf') }}" class="btn btn-primary btn-sm mr-1"><i class="fas fa-print"></i> Cetak Pdf</a>
    <a href="{{ route('anydesk_cetakexcel') }}" class="btn btn-primary btn-sm mr-1"><i class="fas fa-print"></i> Cetak Excel</a>
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
@endpush