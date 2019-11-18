@extends('layouts.app')
@section('title')
Naucma - Get Started
@endsection
@section('content')
<div class="container-fluid header">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center mt-5 animated fadeIn">
                <h3 class="">Welcome to NaučMa</h3>
                <small>What do you want to lear today?</small>
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
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card-deck">
                <div class="card">
                    <div class="card-header">Card1</div>
                    <div class="card-body">asdad</div>
                </div>
                <div class="card">
                    <div class="card-header">Card2</div>
                    <div class="card-body">lore</div>
                </div>
                <div class="card">
                    <div class="card-header">Card3</div>
                    <div class="card-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, debitis
                        laborum, maxime nostrum laudantium ipsa quod, dolor nulla sit quibusdam harum quia unde facere
                        id voluptatem sapiente eius ratione at!</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-8">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Est molestiae quisquam et exercitationem soluta
            inventore nulla, tempore asperiores perspiciatis cumque quaerat quidem, quo at. Nesciunt, magnam! Delectus
            officia ducimus error!
        </div>
        <div class="col-md-4">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla voluptatibus tempora tempore qui, enim
            beatae, reprehenderit praesentium possimus explicabo delectus laboriosam esse adipisci magnam quos suscipit
            est sequi et blanditiis!
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-4">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Est molestiae quisquam et exercitationem soluta
            inventore nulla, tempore asperiores perspiciatis cumque quaerat quidem, quo at. Nesciunt, magnam! Delectus
            officia ducimus error!
        </div>
        <div class="col-md-8">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla voluptatibus tempora tempore qui, enim
            beatae, reprehenderit praesentium possimus explicabo delectus laboriosam esse adipisci magnam quos suscipit
            est sequi et blanditiis!
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12 text-center">
            <a href="#" class="btn btn-primary">Review courses and guides</a>
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