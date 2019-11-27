@extends('layouts.app')
@section('title')
Teacher - Your guides
@endsection
@section('content')
@include('partials.welcome',['header' => 'Welcome to your teacher dashboard','underHeading' => 'All guides and guides
that you have made at one place.'])
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <h4>Your guides</h4>
            <hr>
            <div class="row">
                @if (Request::is('teacher/guides-general'))
                @foreach ($guides as $guide)
                <div class="col-lg-4 mb-3">
                    <a href="{{ route('guide.edit', $guide->slug) }}" class="card guide scale">
                        <img src="{{ asset('storage/' . $guide->image) }}" class="card-img-top" alt="...">
                        <div class="card-body card-body-sm">
                            <h5 class="card-title-lg">{{$guide->title}}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </a>
                </div>
                @endforeach
                @else
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
                            <td>Course</td>
                            <td><a href="#" class="btn btn-success">View</a></td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
                @endif
            </div>
            <div class="d-flex justify-content-center mt-3">
                {!! $guides->links() !!}
            </div>
        </div>
        <div class="col-lg-3">
            @include('teacher.partials.sidebar')
        </div>
    </div>
</div>
@endsection

<style>
    thead tr td {
        border-top: none !important;
    }
</style>