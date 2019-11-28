@extends('layouts.app')
@section('title')
Edit course
@endsection
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Add new episode - course <strong>{{$course->title}}</strong> </div>
                <div class="card-body">
                    <form action="{{ route('episode.store', $course->slug) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" placeholder="Insert title of the episode"
                                name="title">
                        </div>
                        <div class="form-group">
                            <label for="short_description">Short description of this episode</label>
                            <textarea name="short_description" id="short_description" cols="30" rows="5"
                                class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="video">Upload video</label>
                            <input type="file" name="video" id="video" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection