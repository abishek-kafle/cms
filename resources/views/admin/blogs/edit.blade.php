@extends('admin.includes.admin_design')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="card">
            @include('admin.includes._messages')
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h5 class="card-title mb-0">Add Blog</h5>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('blog.index')}}" class="btn btn-primary">View Blogs</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm">
                        <form class="needs-validation" method="POST" action="{{route('blog.update', $blog->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{$blog->title}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="link">Link</label>
                                    <input type="text" class="form-control" id="link" name="link" value="{{$blog->link}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="link">Image</label>
                                    <input type="file" class="form-control" value="" name="image" id="image" accept="image/*" onchange="readURL(this)">
                                    <input type="hidden" name="old" value="{{$blog->image}}">
                                </div>
                                <div class="col-md-6">
                                    @if(!empty($blog->image))
                                        <img id="one" src="{{ asset('public/uploads/blog/'.$blog->image) }}" alt="" style="width: 150px !important;">
                                    @else
                                        <img id="one" src="{{ asset('public/uploads/default/profile.png') }}" alt="" style="width: 150px !important;">
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control editor" name="description" id="description" rows="5">{{$blog->description}}</textarea>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-primary" type="submit">Edit Blog</button>
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
@endsection
