@extends('layouts.app')
@section('title')
Naucma - Jediny Slovensky Portal
@endsection
@section('content')
@include('partials.header',['heading' => 'Welcome to NaučMa', 'underHeading' => 'What do you want to learn today?'])
<div class="container">
    @auth
    {{-- @include('partials.recently_viewed') --}}
    @else
    <div class="row mt-5">
        <div class="col-md-8 offset-md-2 text-center">
            become member
        </div>
    </div>
    @endauth
    <assetsdeck title="General guides & courses" url="{{ route('assets.general') }}"></assetsdeck>
    <assetsdeck title="Microsoft Office" url="{{ route('assets.office') }}"></assetsdeck>
    {{-- @include('partials.pagination_data',['passedAssets' => $assets, 'container' => 'recents','title' => 'Recently added
    guides & courses']) --}}

</div>
<bottombanner></bottombanner>
@endsection
@section('scripts')
<script src="{{ asset('js/pagination_ajax.js') }}"></script>
@endsection