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
{{-- <div class="container-fluid questions">
    <div class="row mt-5">
        <div class="col-md-8 offset-md-2 text-left mt-5">
            <h4>Become a teacher</h4>
            <p>If you would like to become teacher click the link bellow and fill in the application and we will get
                to
                you.</p>
            <a href="#" class="button-white">Click here</a>
        </div>
        <div class="col-md-8 offset-md-2 text-right mt-5">
            <h4>Would you like to have private NaucMa for your company?</h4>
            <p>If you would like to have private portal where your employees can publish internal guides, courses and
                documents
                use the link bellow.</p>
            <a href="#" class="button-white">Click here</a>
        </div>
    </div>
</div> --}}
@endsection
@section('scripts')
<script src="{{ asset('js/pagination_ajax.js') }}"></script>
@endsection