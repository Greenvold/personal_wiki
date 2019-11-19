@extends('layouts.app')
@section('title')
Naucma - Jediny Slovensky Portal
@endsection
@section('content')
@include('partials.header')
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-12 col-md-12">
            <h4>Recent guides and courses</h4>
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