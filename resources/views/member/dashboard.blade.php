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
            <hr>
            <div class="row">
                @foreach ($guides as $guide)
                <div class="col-lg-4 mb-3">
                    <a href="{{ route('guide.show', $guide->slug) }}" class="card guide">
                        <img src="{{ asset('storage/' . $guide->image) }}" class="card-img-top" alt="...">
                        <div class="card-body card-body-sm">
                            <h5 class="card-title-lg">{{$guide->title}}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3">
            <form action="" method="GET" class="mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" id="search">

            </form>


            <div class="list-group">
                <a href="{{ route('member.dashboard-tabular') }}" class="list-group-item list-group-item-action">Tabular
                    view</a>
                <a href="#" class="list-group-item list-group-item-action">Messages</a>
                <a href="#" class="list-group-item list-group-item-action">Settings</a>
            </div>
        </div>
    </div>
</div>
@endsection