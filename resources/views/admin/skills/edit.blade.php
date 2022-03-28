@extends('admin.includes.admin_design')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="card">
            @include('admin.includes._messages')
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h5 class="card-title mb-0">Edit Skill</h5>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('skill.index')}}" class="btn btn-primary">View All Skills</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm">
                        <form class="needs-validation" method="POST" action="{{route('skill.update', $skill->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{$skill->title}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="percentage">Percentage</label>
                                    <input type="text" class="form-control" id="percentage" name="percentage" value="{{$skill->percentage}}">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Update Skill</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
