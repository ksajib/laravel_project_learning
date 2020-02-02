@extends('layouts.backend.app')
@section('title','Tag List')

@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('assets/backend/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles">
@endpush

@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Tag List</h2>
            </div>
            <div class="row">
                <a href="{{ route('admin.tag.create') }}" class="btn btn-primary">Create Tag</a>
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tag List</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if(!empty($tags))
                                            @foreach($tags as $key => $tag)
                                                <tr>
                                                    <td>{{ $key + 1}}</td>
                                                    <td>{{ $tag->name }}</td>
                                                    <td>{{ $tag->slug }}</td>
                                                    <td>{{ $tag->created_at }}</td>
                                                    <td>{{ $tag->updated_at }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.tag.edit', $tag->id) }}" class="btn btn-primary">
                                                            <i class="material-icons">edit</i>
                                                        </a>
                                                        <a class="btn btn-primary" onclick="deleteTag({{ $tag->id }})">
                                                            <i class="material-icons">delete</i>
                                                        </a>
                                                        <form id="delete-form-{{ $tag->id }}" action="{{ route('admin.tag.destroy', $tag->id)}}" method="POST" style="display:none">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
@endsection

@push('js')
<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('assets/backend/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/backend/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/backend/js/jquery-datatable.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
@endpush

<script>
function deleteTag(id){
 console.log(id);
    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
    title: 'Are you sure?',
    text: "Do you want to delete",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
    })
}
</script>
