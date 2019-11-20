@extends('layouts.app')
@section('title')
New guide
@endsection
@section('content')
@include('partials.header_v2',['heading' => 'Browse guides and courses', 'underHeading' => 'What do you want to
learn today?'])

@endsection

<style>
    .card-img-top {
        width: 100%;
        height: 10vw;
        object-fit: cover;
    }

    .header {
        height: 45vh;
        background-image: linear-gradient(to right top, #fff, rgba(103, 161, 197, 1));
    }

    .guide {
        text-decoration: none !important;
        color: inherit;
    }

    .card {
        transition: all .7s;
        min-height: 340px;
    }

    .card:hover {
        transform: scale(1.1);

    }

    .guide:hover {
        color: inherit;
    }

    .card-title {
        font-size: 110%;
        font-weight: 700;
    }

    .card-body {
        font-size: 85%;
    }
</style>