@extends('layouts.app')
@section('title')
Naucma - Jediny Slovensky Portal
@endsection
@section('content')
<div class="container-fluid header">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center mt-5 animated fadeIn">
                <h3 class="">Welcome to NaučMa</h3>
                <small>What do you want to lear today?</small>
            </div>
            <div class="row mt-3">
                <div class="col-md-4 offset-md-4">
                    <form action="">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-12 col-md-12">
            <h4>Recent guides and courses</h4>
            <hr class="shadow">
            <div class="row">
                @foreach ($guides as $guide)
                <div class="col-lg-3 mb-3 col-md-3">
                    <a href="{{ route('guide.preview', $guide->slug) }}" class="card guide shadow">
                        <img src="{{ asset('storage/' . $guide->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{\Illuminate\Support\Str::limit($guide->title,35)}}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{$guides->links()}}
            </div>
        </div>
    </div>
</div>
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