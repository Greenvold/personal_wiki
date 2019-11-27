@extends('layouts.app')
@section('title')
Teacher - Your guides
@endsection
@section('content')
@include('partials.welcome',['header' => 'Welcome to your teacher dashboard','underHeading' => 'All guides and guides
that you have made at one place.'])
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <h4>Search results</h4>
            <hr>
            <div class="row">
                @foreach ($assets as $asset)
                <div class="col-lg-4 mb-3">
                    <a href="
                    @if ($asset->type == 'guide')
                        {{ route('guide.edit', $asset->slug) }}
                    @else
                        {{ route('course.edit', $asset->slug) }}
                    @endif
                    " class="card guide scale">
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
                {!! $assets->appends(request()->input())->links() !!}
            </div>
        </div>
        <div class="col-lg-3">
            @include('teacher.partials.sidebar')
        </div>
    </div>
</div>
@endsection

<style>
    thead tr td {
        border-top: none !important;
    }
</style>