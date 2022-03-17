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
                <form class="needs-validation" method="POST" action="{{route('updatePassword', $admin->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="old_password">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                            <p id="correct_password"></p>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="col-md-6 mb-3">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        </div>
                        <div class="col-md-6 mb-3">

                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Change Password</button>
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
                    confirmButtonText: "Yes, Delete it!",
                },
                function () {
                    window.location.href =  SITEURL + "/admin/" + deleteFunction + "/" + id;
                });
        });
    </script>

    <script>
        $("#current_password").keyup(function () {
            var current_password = $("#current_password").val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: 'check-password',
                data: {current_password:current_password},
                success: function (resp) {
                    if(resp == "true"){
                        $("#correct_password").text("Current Password Matches").css("color", "green");
                    }else if(resp == "false"){
                        $("#correct_password").text("Password Does Not Match").css("color", "red");
                    }
                }, error: function (resp) {
                    alert("Something Went Wrong");
                }
            });
        });
    </script>
@endsection
