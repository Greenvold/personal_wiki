@extends('layouts.app')
@section('title')
Course preview - {{$course->slug}}
@endsection
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card animated fadeIn">
                <div class="card-header">
                    {{$course->title}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                    </div>
                    {!!$course->short_description!!}
                    <form action="{{ route('course.enroll',$course->slug) }}" method="POST">
                        @csrf
                        <button class="btn btn-success" type="submit">Enroll and go to course</button>
                    </form>
                </div>
                <div class="card-footer">
                    {{$course->published_at}} by {{$course->author->name}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection