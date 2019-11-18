@extends('layouts.app')
@section('title')
New guide
@endsection
@section('content')
<div class="container-fluid header">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center mt-5 animated fadeIn">
                <h3 class="">Welcome to NaučMa</h3>
                <small>What do you want to learn today?</small>
            </div>
            <div class="row mt-3">
                <div class="col-md-4 offset-md-4">
                    <form action="">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection

<style>
    .card-img-top {
        width: 100%;
        height: 10vw;
        object-fit: cover;
    }

    .header {
        height: 45vh;
        background-image: linear-gradient(to right top, #fff, rgba(103, 161, 197, 1));
    }

    .guide {
        text-decoration: none !important;
        color: inherit;
    }

    .card {
        transition: all .7s;
        min-height: 340px;
    }

    .card:hover {
        transform: scale(1.1);

    }

    .guide:hover {
        color: inherit;
    }

    .card-title {
        font-size: 110%;
        font-weight: 700;
    }

    .card-body {
        font-size: 85%;
    }
</style>