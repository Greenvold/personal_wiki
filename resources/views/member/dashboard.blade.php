@extends('layouts.app')
@section('title')
My Dashboard
@endsection
@section('content')
@include('partials.welcome',['header' => 'Welcome to your dashboard', 'underHeading' => 'All your enrolled guides
and courses.'])
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <h4 class="content-heading">Enrolled assets</h4>
            <hr>
            <div class="row">
                @foreach ($assets as $asset)
                <div class="col-lg-4 mb-3">
                    <a href="@if ($asset->type == 'guide')
                        {{ route('guide.show', $asset->slug) }}
                    @else
                        {{ route('course.show', [$asset->slug, auth()->user()->lastViewedEpisode($asset->id)->slug]) }}
                    @endif" class=" card asset scale">
                        <img src="{{ asset('storage/' . $asset->image) }}" class="card-img-top" alt="...">
                        <div class="card-body card-body-sm">
                            <h5 class="card-title-lg">{{$asset->title}}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-3">

            </div>
        </div>
        <div class="col-lg-3">
            @include('member.partials.sidebar')
        </div>
    </div>
</div>
@endsection