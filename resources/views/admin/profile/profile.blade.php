@extends('admin.includes.admin_design')

@section('content')
<div class="page-wrapper">

<div class="content container-fluid">

<div class="card">
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
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="col-md-6 mb-3">
                            <img src="" alt="profile image">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
