@extends('layouts.app')
@section('title')
{{$course->title}}
@endsection
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-9">
            <video id="my-video" class="video-js vjs-waiting" controls preload="auto" width="640" height="264"
                poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                <source src="{{ route('video',$episode->video) }}" type="video/mp4" />
                <p class="vjs-no-js">

                    To view this video please enable JavaScript, and consider upgrading to a
                    web browser that
                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                </p>
            </video>
        </div>
        <div class="col-lg-3">
            <ul class="list-group">
                @foreach ($episodes as $episode)
                <li class="list-group-item">{{$episode->title}}</li>
                @endforeach

            </ul>
        </div>
        <div class="col-lg-12">
            About episode and course
            {{$episode->video}}
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
@endsection
@section('styles')
<link href="https://vjs.zencdn.net/7.5.5/video-js.css" rel="stylesheet" />
<style>
    .video-js {
        position: relative !important;
        width: 100% !important;
        height: auto !important;
    }
</style>
@endsection