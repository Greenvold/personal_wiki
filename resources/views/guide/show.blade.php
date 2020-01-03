@extends('layouts.app')
@section('title')
{{$guide->title}}}}
@endsection
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <guide :guide="{{$guide}}" :default_dislikes='{{$guide->downVotes}}' :default_likes='{{$guide->upVotes}}'>
            </guide>

            {{-- <div class="card mt-4">
    <div class="card-body">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-question-tab" data-toggle="tab" href="#nav-question"
                    role="tab" aria-controls="nav-question" aria-selected="true">Questions</a>
                <a class="nav-item nav-link" id="nav-comments-tab" data-toggle="tab" href="#nav-comments" role="tab"
                    aria-controls="nav-comments" aria-selected="false">Comments</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-question" role="tabpanel" aria-labelledby="nav-question-tab">
                @include('partials.question', ['asset' => $guide])
                <div class="guide__questions">
                    <h4>Recent questions</h4>
                    <hr>
                    @include('questions.index',['questions' => $guide->questions])
                </div>
            </div>
            <div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-comments-tab">
                ...</div>
        </div>
    </div>
</div> --}}
        </div>
    </div>
</div>


@endsection

@section('scripts')

@endsection