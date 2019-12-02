@extends('layouts.app')
@section('title')
Gudies & Courses
@endsection
@section('content')
@include('partials.header',['heading' => 'Browse guides and courses', 'underHeading' => 'What do you want to
learn today?'])
<div class="container">

    {{-- Checks whether to display search results or recently viewed if logged in --}}
    @auth
    @if (!Request::get('search'))
    @include('partials.recently_viewed')
    @else
    @endif
    @endauth

    {{-- Search results or Recently added --}}
    @if (!Request::get('search'))
    @include('partials.pagination_data',['passedAssets' => $assets, 'container' => 'recents','title' => 'Recently added
    guides & courses'])
    @else
    @include('partials.pagination_data',['passedAssets' => $assets, 'container' => 'recents','title' => 'Search
    results'])
    @endif

    @if (Request::get('search'))
    <div class="text-center">
        <h3>Other guides that you might like</h3>
    </div>
    @endif

    @include('partials.pagination_data',['passedAssets' => $officeGuides, 'container' => 'officeGuides', 'title' =>
    'Microsoft
    office guides & courses'])

    @include('partials.pagination_data',['passedAssets' => $webGuides, 'container' => 'webGuides', 'title' => 'Web
    Development guides & courses'])
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/pagination_ajax.js') }}"></script>
@endsection