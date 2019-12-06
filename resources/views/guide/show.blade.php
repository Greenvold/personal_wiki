@extends('layouts.app')
@section('title')
Naucma - Get Started
@endsection
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="w-100">
                            {{$guide->title}}
                        </div>
                        <div class=" flex-shrink">
                            <span id="like" class="like
                        
                        "><i class="fa fa-thumbs-up @if ($guide->likedByUser($guide->id))
                        activated @endif" id="like_icon" aria-hidden="true"></i></span>

                        </div>
                        <div class="flex-shrink ml-3">
                            <span class="dislike 
                           " id="dislike"><i class="fa fa-thumbs-down @if ($guide->disLikedByUser($guide->id))
                               activated
                           @endif" id="dislike_icon" aria-hidden="true"></i></span>
                        </div>
                        <div class="flex-shrink ml-3">
                            <span class="like"><i class="fa fa-share" aria-hidden="true"></i></span>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    {!!$guide->content!!}
                </div>
                <div class="card-footer">
                    {{$guide->published_at}} by {{$guide->author->name}}
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-question-tab" data-toggle="tab"
                                href="#nav-question" role="tab" aria-controls="nav-question"
                                aria-selected="true">Questions</a>
                            <a class="nav-item nav-link" id="nav-comments-tab" data-toggle="tab" href="#nav-comments"
                                role="tab" aria-controls="nav-comments" aria-selected="false">Comments</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-question" role="tabpanel"
                            aria-labelledby="nav-question-tab">
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
            </div>
        </div>
    </div>
</div>


@endsection
<style>
    .like,
    .dislike {
        color: grey;
        font-size: 120%;
        cursor: pointer;
    }

    .activated {
        color: green;
    }

    .red {
        color: red;
    }
</style>

@section('scripts')
<script type="text/javascript">
    $('#like').on('click', function(e){
    // var data = $('form').serialize();
    var url = '{{route('guide.like',$guide->id)}}';

    $.ajax({
        type: 'post',
        url: url,
        data: {id:{{$guide->id}}},
        dataType: 'json',
        success: function(data) {
            console.log(data);
         document.getElementById('like_icon').classList.add('animated','pulse', 'activated');
         document.getElementById('dislike_icon').classList.remove('activated');
        },
        error: function() {
           alert('error')
        }
    });
});

$('#dislike').on('click', function(e){
  
  // var data = $('form').serialize();
  var url = '{{route('guide.dislike',$guide->id)}}';

  $.ajax({
      type: 'post',
      url: url,
      data: {id:{{$guide->id}}},
      dataType: 'json',
      success: function(data) {
          console.log(data);
       document.getElementById('dislike_icon').classList.add('animated','pulse','activated');
       document.getElementById('like_icon').classList.remove('activated');
      },
      error: function() {
         alert('error')
      }
  });
});
</script>
@endsection