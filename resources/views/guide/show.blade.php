@extends('layouts.app')
@section('title')
Naucma - Get Started
@endsection
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    {{$guide->published_at}} by {{$guide->author->name}}1
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
    var url = 'http://127.0.0.1:8000//guide/' + {{$guide->id}} + '/like';

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
  var url = 'http://127.0.0.1:8000//guide/' + {{$guide->id}} + '/dislike';

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