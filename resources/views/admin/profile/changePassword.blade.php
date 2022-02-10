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
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="old_password">Current Password</label>
                            <input type="password" class="form-control" id="old_password" name="old_password">
                        </div>
                        <div class="col-md-6 mb-3">

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
