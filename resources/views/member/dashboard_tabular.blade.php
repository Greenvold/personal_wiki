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
            <table class="table">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Author</td>
                        <td>Type</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($guides as $guide)
                    <tr>
                        <td>{{$guide->title}}</td>
                        <td>{{$guide->author->name}}</td>
                        <td>Guide</td>
                        <td><a href="#" class="btn btn-success">View</a></td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-lg-3 ">
            <form action="" method="GET" class="mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" id="search">
            </form>

            <div class="list-group">
                <a href="{{ route('member.dashboard') }}" class="list-group-item list-group-item-action">Classic
                    view</a>
                <a href="#" class="list-group-item list-group-item-action">Messages</a>
                <a href="#" class="list-group-item list-group-item-action">Settings</a>
            </div>
        </div>
    </div>
</div>
@endsection