@extends('admin.includes.admin_design')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="card">
            @include('admin.includes._messages')
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h5 class="card-title mb-0">Add Timeline</h5>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('timeline.index')}}" class="btn btn-primary">View Records</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm">
                        <form class="needs-validation" method="POST" action="{{route('timeline.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-5 mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="organization">Organization</label>
                                    <input type="text" class="form-control" id="organization" name="organization">
                                </div>
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control editor" name="description" id="description" rows="5"></textarea>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-primary" type="submit">Add Record</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $( '.editor' ).ckeditor();
        } );
    </script>
@endsection
