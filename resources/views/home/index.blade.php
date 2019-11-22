@extends('layouts.app')
@section('title')
Naucma - Jediny Slovensky Portal
@endsection
@section('content')
@include('partials.header',['heading' => 'Welcome to NaučMa', 'underHeading' => 'What do you want to learn today?'])
<div class="container">
    @auth
    @include('partials.recently_viewed')
    @else
    <div class="row mt-5">
        <div class="col-md-8 offset-md-2 text-center">
            become member
        </div>
    </div>
    @endauth
    @include('partials.recently_added')
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