@extends('layouts.app')
@section('title')
{{$course->title}} overview
@endsection
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="cardheader">{{$course->title}} overview</div>
        <div class="card-body">
            {{$course->short_description}}
            <p>Last watched episode id</p>
            @if (isset( $lastEpisode->id))
            <a href="{{ route('course.continue', [$course->slug,$lastEpisode->slug]) }}"
                class="btn btn-success">Continue watching</a>
            @else
            <a href="{{ route('course.start', $course->slug) }}" class="btn btn-success">Start course</a>
            @endif
        </div>
    </div>
</div>
@endsection