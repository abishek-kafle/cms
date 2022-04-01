@extends('admin.includes.admin_design')

@section('content')
<div class="page-wrapper">

    <div class="content container-fluid">

        <div class="card">
            @include('admin.includes._messages')
            <div class="card-header">
                <h5 class="card-title mb-0">About Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm">
                        <form class="needs-validation" method="POST" action="{{route('about.update', $about->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control editor" id="description" cols="30" rows="10">{{$about->description}}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="project">Projects (in number)</label>
                                    <input type="text" class="form-control" id="project" name="project" value="{{$about->projects}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="experience">Experience (in years)</label>
                                    <input type="text" class="form-control" id="experience" name="experience" value="{{$about->experience}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="client">Clients</label>
                                    <input type="text" class="form-control" id="client" name="client" value="{{$about->clients}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="review">Reviews</label>
                                    <input type="text" class="form-control" id="review" name="review" value="{{$about->reviews}}">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Update About</button>
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
