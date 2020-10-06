@extends('layouts.master')
@section('content')
@section('title')
    Data Region
@endsection
 <div class="section-body">
     <div class="row">
         <div class="col-12 col-md-12 col-lg-12">
            <a href="{{ route('Region_tambah') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
            <hr>
            @if (session('message'))               
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                     {{ session('message') }}
                </div>
            @endif

            <table class="table table-striped table-bordered table-md">
                <tr>
                    <th style="width:5%;">No</th>
                    <th>Region</th>
                    <th>Action</th>
                </tr>
                 @foreach ($data as $no=> $datas)
                    <tr>
                       <td>{{ $data->firstItem()+$no }}</td>
                       <td>{{ $datas->region }}</td>
                     
                       <td>
                           <a href="{{ route('region.edit',$datas->id) }}" class="badge badge-warning">Edit</a> 
                           <a href="#" data-id="{{ $datas->id }}" class="badge badge-danger hapus">
                           <form action="{{ route('Region_delete',$datas->id) }}" id="delete{{ $datas->id }}" method="post">
                                @csrf
                                @method('delete')
                            </form>  
                            Delete</a>
                           
                       </td>
                    </tr>
                 @endforeach
            </table>
            {{ $data->links() }}
        </div>
     </div>

</div>
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
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                 $(`#delete${id}`).submit();
                }
            })
        });
   </script>

   
@endpush