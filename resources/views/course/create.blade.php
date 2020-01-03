@extends('layouts.app')
@section('title')
New Course
@endsection
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card animated fadeIn">
                <div class="card-header">New Course</div>
                <div class="card-body">
                    <form action="{{isset($course) ? route('asset.update',$course->slug) : route('asset.store')}}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        @isset($course)
                        @method('PUT')
                        @endisset
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{isset($course) ? $course->title : ''}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="short_description">Guide Short description</label>
                                <textarea name="short_description" id="short_description" class="form-control"
                                    rows="4">{{isset($course) ? $course->short_description : ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="content">Guide text</label>
                                <textarea name="content" id="content" cols="30"
                                    rows="10">{{isset($course) ? $course->content : ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="tags">Tags</label>
                                <select name="tags[]" id="tags" class="form-control tag-selector" multiple>
                                    @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}" @if (isset($course)) @if ($course->
                                        hasTag($tag->title))
                                        selected
                                        @endif
                                        @endif
                                        >{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="published_at">Published at</label>
                                <input type="text" placeholder="Select date" class="form-control" name="published_at"
                                    id="published_at" value="{{isset($course) ? $course->published_at : ''}}">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="image">Guide image</label>
                                <input type="file" name="image" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $('#content').summernote({
        height: 300
    });

    
    flatpickr('#published_at',{
        enableTime:false,
        enableSeconds:false,
        dateFormat: 'd/m/Y',
        minDate: "today"
    })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
            $('.tag-selector').select2();
        });
</script>
@endsection