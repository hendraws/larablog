@extends('backend.layout.master')
@section('title','Post Page')
@section('add-css')@endsection

@section('content')
<div class="card-header">
    <h3 class="card-title">List Posts</h3>
</div>
<div class="row mr-3 mt-3 ">
    <div class="col-md-12">
        <a class="btn btn-primary btn-sm float-right  modal-button" href="Javascript:void(0)" data-mode="Lg" data-target="ModalForm" data-url="{{ action('PostController@create') }}" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-fw fa-plus mr-2"></i><span>Add Post</span></a>
    </div>
</div>
<!-- /.card-header -->
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->title}}</td>
                <td>{{ $post->category->name}}</td>
                <td class="text-center">
                    <a class="btn btn-warning btn-sm modal-button" href="Javascript:void(0)" data-mode="Lg" data-target="ModalForm" data-url="{{ action('PostController@edit', $post->id) }}" data-toggle="tooltip" data-placement="left" title="edit"><i class="fas fa-fw fa-edit"></i></a>
                    <a href="#" class="btn btn-danger btn-sm delete" data-id="{{$post->id}}" data-url="{{ action('PostController@delete', $post->id) }}" ><i class="fas fa-fw fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
<!-- /.card-body -->
@endsection
@section('add-js')
<script>
    $(function() {
        $("#example1").DataTable({
            "columnDefs": [{
                "width": "15%",
                "targets": 2
            }]
        });
    });

    $('#ModalForm').on('shown.bs.modal', function() {
        console.log('asdf');
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '.delete', function() {
        var url = $(this).attr('data-url');
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete.value) {
                    window.location = url;
                }
            });
    });
</script>
@endsection