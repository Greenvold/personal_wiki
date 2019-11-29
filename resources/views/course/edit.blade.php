@extends('layouts.app')
@section('title')
Edit course
@endsection
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    {{$course->title}}
                </div>
                <div class="card-body">
                    <form action="{{ route('course.update', $course->slug) }}" method="PUT">
                        @csrf
                        <div class="form-group">
                            <label for="title">Course title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$course->title}}">
                        </div>
                        <div class="form-group">
                            <label for="short_description">Short description</label>
                            <textarea type="text" class="form-control" name="short_description" id="short_description">{{$course->short_description}}
                            </textarea>
                            <small id="short_descriptionHelp" class="form-text text-muted">Displayed on the card on home
                                page and guides & coruses page.</small>
                        </div>
                        <div class="form-group">
                            <label for="content">Course description</label>
                            <textarea type="text" class="form-control" name="content" id="content" rows="8">{{$course->content}}
                            </textarea>
                            <small id="contentHelp" class="form-text text-muted">Displayed in the course overview and
                                About course section.</small>
                        </div>
                        <div class="form-group text-center">
                            <div class="row">
                                <div class="col-lg-6 offset-lg-3 mb-3">
                                    <img src="{{ asset('storage/' . $course->image) }}" class="card-img" alt="...">
                                </div>
                            </div>
                            <label for="image">Course Image</label>
                            <input type="file" class="fomr-file-control">
                        </div>
                    </form>
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <ul class="list-group">
                <a href="{{ route('course.edit', $course->slug) }}" class="list-group-item list-group-item-action
                    {{Request::is('course/' . $course->slug . '/edit') ? 'active' : ''}}">Course details</a>
                <a href="#" class="list-group-item list-group-item-action">Manage Episodes</a>
                <a href="#" class="list-group-item list-group-item-action">Course statistics</a>
                <a href="#" class="list-group-item list-group-item-action">Course Q&A</a>
                <a href="#" class="list-group-item list-group-item-action">Course reviews</a>
            </ul>
        </div>
    </div>
</div>
@endsection