@extends('admin.includes.admin_design')

@section('content')
<div class="page-wrapper">

<div class="content container-fluid">

<div class="card">
    @include('admin.includes._messages')
    <div class="card-header">
        <h5 class="card-title mb-0">Admin Profile</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm">
                <form class="needs-validation" method="POST" action="{{route('adminProfileUpdate', $admin->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$admin->username}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$admin->email}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$admin->address}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$admin->phone}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" value="" name="image" id="image" accept="image/*" onchange="readURL(this)">
                        </div>
                        <div class="col-md-6 mb-3">
                            @if(!empty($admin->image))
                                <img id="one" src="{{ asset('public/uploads/admin/'.$admin->image) }}" alt="" style="width: 150px !important;">
                            @else
                                <img id="one" src="{{ asset('public/uploads/default/profile.png') }}" alt="" style="width: 150px !important;">
                            @endif
                        </div>
                    </div>
                    <a href="javascript:" rel="{{ $admin->id }}" rel1="delete-image" class="btn btn-danger btn-delete px-4">Delete Image</a>
                    <button class="btn btn-primary" type="submit">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
@section('js')
    <script type="text/javascript">
        function readURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e){
                    $("#one").attr('src', e.target.result).width(150);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
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
