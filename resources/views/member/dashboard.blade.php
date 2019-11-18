@extends('layouts.app')
@section('title')
My Dashboard
@endsection
@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="jumbotron">
                <h1 class="display-4">Welcome to your dashboard</h1>
                <p class="lead">In here you can find list of all your enrolled and bought guides and courses.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <h4>Enrolled guides</h4>
            <hr my-1>
            <div class="row">
                @foreach ($guides as $guide)
                <div class="col-lg-4 mb-3">
                    <a href="{{ route('guide.show', $guide->slug) }}" class="card guide" style="min-height:282px;">
                        <img src="{{ asset('storage/' . $guide->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$guide->title}}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3">
            <form action="" method="GET">
                <input type="text" class="form-control" placeholder="Search...">

            </form>


            <div class="list-group">
                <div class="list-group-item">Notifications</div>
                <div class="list-group-item">Messages</div>
                <div class="list-group-item">Settings</div>
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
        transform: scale(1.05);

    }

    .guide:hover {
        color: inherit;
    }

    .card-title {
        font-size: 110%;
    }

    .card-body {
        font-size: 85%;
    }
</style>