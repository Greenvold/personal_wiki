@extends('layouts.app')
@section('title')
New guide
@endsection
@section('content')
@include('partials.header_v2',['heading' => 'Browse guides and courses', 'underHeading' => 'What do you want to
learn today?'])
<div class="container">
    @auth
    <div class="row mt-5">
        <div class="col-md-12 mb-3">
            <h3 class="content-heading"> Welcome back {{auth()->user()->name}}</h3>
            <small>Ready to jump back in?</small>
        </div>
        @foreach ($recents as $recent)
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="row no-gutters recent">
                    @php
                    if(rand(0,1) == 1)
                    {
                    echo '<div class="ribbon-free"><span>FREE</span></div>';
                    }else{
                    echo '<div class="ribbon-paid"><span>PAID</span></div>';
                    }
                    @endphp
                    <div class="col-md-4 my-auto">
                        <img src="{{ asset('storage/' . $recent->image) }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$recent->title}}</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last viewed at
                                    {{$recent->updated_at}}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endauth

    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="row mt-">
                <div class="col-lg-12 col-md-12">
                    <h4 class="content-heading">Recently added</h4>
                    <hr class="shadow">
                    <div id="cards">
                        @include('home.pagination_data')
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4">
            <h4 class="content-heading">Microsoft office guides & courses</h4>
            <hr class="shadow">
            <div id="cards">
                @include('home.pagination_data')
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4">
            <h4 class="content-heading">SharePoint guides & courses</h4>
            <hr class="shadow">
            <div id="cards">
                @include('home.pagination_data')
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
          fetch_data(page);
         });

         function fetch_data(page)
         {
          $.ajax({
           url:"/home/fetch_data?page="+page,
           type:"Get",
           method:"get",
           success:function(data)
           {
            $('#cards').html(data);
           }
          });
         }

        });
</script>
@endsection


<style>
    .button-white {
        border-radius: 30px;
        background-color: #fff;
        color: black;
        padding: 14px;
        text-decoration: none !important;
        transition: all .5s;
        display: inline-block;
        backface-visibility: hidden;

        min-width: 115px;
    }

    .button-white:hover {
        transform: translateY(-5px);
        color: black;
    }

    .categories {
        height: 6.5vh;
        background-color: grey;
    }
</style>