@extends('layouts.app')
@section('title')
Naucma - Jediny Slovensky Portal
@endsection
@section('content')
@include('partials.header_v2',['heading' => 'Welcome to NaučMa', 'underHeading' => 'What do you want to learn today?'])
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-12 col-md-12">
            <h4 class="content-heading">Recent guides and courses</h4>
            <hr class="shadow">
            <div id="cards">
                @include('home.pagination_data')
            </div>
        </div>
    </div>

</div>
<div class="container-fluid questions">
    <div class="row mt-5">
        <div class="col-md-8 offset-md-2 text-left mt-5">
            <h4>Become a teacher</h4>
            <p>If you would like to become teacher click the link bellow and fill in the application and we will get
                to
                you.</p>
            <a href="#" class="button-white">Click here</a>
        </div>

        <div class="col-md-8 offset-md-2 text-right mt-5">
            <h4>Would you like to have private NaucMa for your company?</h4>
            <p>If you would like to have private portal where your employees can publish internal guides and
                documents
                use the link bellow.</p>
            <a href="#" class="button-white">Click here</a>
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
    .questions {
        height: 35vh;
        background-image: linear-gradient(48deg, rgba(90, 90, 232, 1) 19%, rgba(103, 161, 197, 1) 100%);
        font-family: 'Montserrat', sans-serif;
        color: #fff;
    }

    .button-white {
        border-radius: 30px;
        background-color: #fff;
        color: black;
        padding: 14px;
        text-decoration: none !important;
        transition: all .5s;
        display: inline-block;
        backface-visibility: hidden;


    }

    .button-white:hover {
        transform: translateY(-5px);
        color: black;
    }
</style>