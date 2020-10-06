@extends('layouts.master')
@section('content')
@section('title')
Kode Lokasi
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
                        <th style="width:10%;">Kode Lokasi</th>
                        <th style="width:10%;">Tipe Lokasi</th>
                        <th style="width:20%;">Aksi</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($data as $no=> $datas)
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td>{{ $datas->Kodelokasi}}</td>
                            <td>{{ $datas->Tipelokasi}}</td>
                            <td>
                                <a href="{{ route('kodelokasi_edit',$datas->id) }}" class="badge badge-warning">Ubah </a>
                                <a href="#" data-id="{{ $datas->id }}" class="badge badge-danger hapus">
                                <form action="{{ route('kodelokasi_delete',$datas->id) }}" id="delete{{ $datas->id }}" method="post">
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

@endsection
@section('tombol-cetak')
    <a href="{{ route('kodelokasi_create') }}" class="btn btn-icon btn-sm icon-left btn-primary mr-1"><i class="fas fa-plus"></i> Tambah Data</a>
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