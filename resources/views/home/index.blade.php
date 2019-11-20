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
    <div class="row mt-4">
        <div class="col-md-8 offset-md-2 text-center">
            <h4>Become a teacher</h4>
            <p>If you would like to become teacher click the link bellow and fill in the application and we will get to
                you.</p>
            <a href="#" class="btn btn-primary">Click here</a>
        </div>
    </div>
    <div class="col-md-8 offset-md-2 text-center mt-5">
        <h4>Would you like to have private NaucMa for your company?</h4>
        <p>If you would like to have private portal where your employees can publish internal guides and documents
            use the link bellow.</p>
        <a href="#" class="btn btn-primary">Click here</a>
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