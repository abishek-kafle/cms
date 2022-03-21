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
                        <form class="needs-validation" method="POST" action="{{route('bio.update', $bio->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{$bio->title}}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{$bio->description}}</textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Update Bio</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
