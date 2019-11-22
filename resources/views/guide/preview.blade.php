@extends('layouts.app')
@section('title')
Guide preview
@endsection
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card animated fadeIn">
                <div class="card-header">
                    {{$guide->title}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                    </div>
                    {!!$guide->short_description!!}
                    <form action="{{ route('guide.enroll',$guide->slug) }}" method="POST">
                        @csrf
                        <button class="btn btn-success" type="submit">Enroll and go to guide</button>
                    </form>
                </div>
                <div class="card-footer">
                    {{$guide->published_at}} by {{$guide->author->name}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection