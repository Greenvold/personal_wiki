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
                    <div class="d-flex">
                        <div class="flex-fill mt-2">
                            <strong>Enroll to new guide</strong>
                        </div>
                        <div>
                            <form action="{{ route('asset.enroll',$guide->slug) }}" method="POST">
                                @csrf
                                <button class="btn btn-success" type="submit">Enroll</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('/storage/' . $guide->image) }}" class="img-fluid" alt="guide_image">
                        </div>
                        <div class="col-md-8">
                            <h3>{{$guide->title}}</h3>
                            @foreach ($guide->tags as $tag)
                            <span class="badge badge-info">{{$tag->title}}</span>
                            @endforeach
                            <p>{{$guide->short_description}}</p>
                        </div>
                    </div>
                    <div class="text-center col-md-12 mt-2">

                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-muted mb-0"> {{$guide->published_at}} by {{$guide->author->name}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection