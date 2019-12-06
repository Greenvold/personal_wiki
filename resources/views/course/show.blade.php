@extends('layouts.app')
@section('title')
{{$course->title}}
@endsection
@section('content')

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-7 offset-lg-1">
            <div class="card">
                <div class="card-header"><strong>{{$thisEpisode->title}}</strong></div>
                <div class="card-body">
                    <video id="my-video" class="video-js vjs-waiting" controls preload="auto" width="640" height="264"
                        poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                        <source src="{{ route('video', $thisEpisode->video) }}" type="video/mp4" />
                        <p class="vjs-no-js">

                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                        </p>
                    </video>
                    <div class="row mt-5 mx-1">
                        <div class="col-lg-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="aboutEpisode-tab" data-toggle="tab"
                                        href="#aboutEpisode" role="tab" aria-controls="aboutEpisode"
                                        aria-selected="true">About Episode</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="aboutCourse-tab" data-toggle="tab" href="#aboutCourse"
                                        role="tab" aria-controls="aboutCourse" aria-selected="false">About Course</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="aboutAuthor-tab" data-toggle="tab" href="#aboutAuthor"
                                        role="tab" aria-controls="aboutAuthor" aria-selected="false">About Author</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="qanda-tab" data-toggle="tab" href="#qanda" role="tab"
                                        aria-controls="qanda" aria-selected="false">Questions & Answers</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="aboutEpisode" role="tabpanel"
                                    aria-labelledby="aboutEpisode-tab">
                                    <h4>{{$thisEpisode->title}}</h4>
                                    <p>{{$thisEpisode->short_description}}</p>
                                </div>
                                <div class="tab-pane fade" id="aboutCourse" role="tabpanel"
                                    aria-labelledby="aboutCourse-tab">
                                    <h4>About course</h4>
                                    <p>{{$course->short_description}}</p>
                                </div>
                                <div class="tab-pane fade" id="aboutAuthor" role="tabpanel"
                                    aria-labelledby="aboutAuthor-tab">
                                    <h4>About author</h4>
                                    <p>{{$course->author->name}}</p>
                                </div>
                                <div class="tab-pane fade" id="qanda" role="tabpanel" aria-labelledby="qanda-tab">
                                    @include('partials.question', ['asset' => $course])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-3 ">
            <ul class="list-group">

                @foreach ($episodes as $key=>$episode)

                <a href="{{ route('course.show', [$course->slug, $episode->slug]) }}" class="list-group-item list-group-item-action 
                    @if ($episode->slug ==  $thisEpisode->slug )
                    active
                    @endif
                    ">
                    <small>Episode {{$key+1}} </small>
                    <br>
                    <strong>{{$episode->title}}</strong></a>
                @endforeach

            </ul>
            </strong>
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