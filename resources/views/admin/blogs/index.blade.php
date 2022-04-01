@extends('admin.includes.admin_design')

@section('content')
<div class="page-wrapper">

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Blogs Management</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Blogs</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="card">
            @include('admin.includes._messages')
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h5 class="card-title mb-0">Blogs Management</h5>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('blog.add')}}" class="btn btn-primary">Add Blog</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-stripped mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{$blog->id}}</td>
                                    <td>{{$blog->title}}</td>
                                    <td>{{$blog->link}}</td>
                                    <td><img src="{{asset('public/uploads/blog/'.$blog->image)}}" alt="" style="width: 150px;"></td>
                                    <td>
                                        <a href="{{route('blog.edit', $blog->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:" rel="{{ $blog->id }}" rel1="blog/delete" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>
    <script>
        $('body').on('click', '.btn-delete', function (event) {
            event.preventDefault();
            var SITEURL = '{{ URL::to('') }}';
            var id = $(this).attr('rel');
            var deleteFunction = $(this).attr('rel1');
            swal({
                    title: "Are You Sure? ",
                    text: "You will not be able to recover this record again",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Delete it!"
                },
                function () {
                    window.location.href =  SITEURL + "/admin/" + deleteFunction + "/" + id;
                }
            );
        });
    </script>
@endsection
