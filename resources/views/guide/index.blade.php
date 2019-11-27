@extends('layouts.app')
@section('title')
Gudies & Courses
@endsection
@section('content')
@include('partials.header',['heading' => 'Browse guides and courses', 'underHeading' => 'What do you want to
learn today?'])
<div class="container">

    {{-- Checks whether to display search results or recently viewed if logged in --}}
    @auth
    @if (!Request::get('search'))
    @include('partials.recently_viewed')
    @else
    @endif
    @endauth

    {{-- Search results or Recently added --}}
    @if (!Request::get('search'))
    @include('partials.pagination_data',['passedGuides' => $guides, 'container' => 'recents','title' => 'Recently added
    guides & courses'])
    @else
    @include('partials.pagination_data',['passedGuides' => $guides, 'container' => 'recents','title' => 'Search
    results'])
    @endif

    @if (Request::get('search'))
    <div class="text-center">
        <h3>Other guides that you might like</h3>
    </div>
    @endif

    @include('partials.pagination_data',['passedGuides' => $officeGuides, 'container' => 'officeGuides', 'title' =>
    'Microsoft
    office guides & courses'])

    @include('partials.pagination_data',['passedGuides' => $webGuides, 'container' => 'webGuides', 'title' => 'Web
    Development guides & courses'])
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){

         $(document).on('click', '.pagination a', function(event){
          event.preventDefault(); 
          var page = $(this).attr('href').split('page=')[1];
          var container = ($(this).parents()[6].id);
          console.log(container)
          ;
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