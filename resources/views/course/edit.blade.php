@extends('layouts.app')
@section('title')
Edit course
@endsection
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    {{$course->title}}
                </div>
                <div class="card-body">
                    <h3>Short Description</h3>
                    <p>{{$course->short_description}}</p>
                    <h3>Episodes</h3>
                    <button class="btn btn-success">Add new episode</button>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            side
        </div>
    </div>
</div>
@endsection