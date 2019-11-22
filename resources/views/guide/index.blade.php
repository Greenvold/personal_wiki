@extends('layouts.app')
@section('title')
Gudies & Courses
@endsection
@section('content')
@include('partials.header',['heading' => 'Browse guides and courses', 'underHeading' => 'What do you want to
learn today?'])
<div class="container">
    @auth
    @include('partials.recently_viewed')
    @endauth
    @include('partials.recently_added')
    <div class="row">
        <div class="col-md-12 mt-4">
            <h4 class="content-heading">Microsoft office guides & courses</h4>
            <hr class="shadow">
            <div id="officeGuides">
                @include('partials.pagination_data',['passedGuides' => $officeGuides, 'container' => 'officeGuides'])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4">
            <h4 class="content-heading">Web Development guides & courses</h4>
            <hr class="shadow">
            <div id="webGuides">
                @include('partials.pagination_data',['passedGuides' => $webGuides, 'container' => 'webGuides'])
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){

         $(document).on('click', '.pagination a', function(event){
          event.preventDefault(); 
          var page = $(this).attr('href').split('page=')[1];
          var container = ($(this).parents()[4].id);
          fetch_data(page,container);
          
         });

         function fetch_data(page,container)
         {
          $.ajax({
           url:"/home/fetch_data/?page="+page,
           type:"Get",
           method:"get",
           data: {type : container},
           success:function(data)
           {
              
            $('#'+ container).html(data);
           }
          });
         }

        });
</script>
@endsection