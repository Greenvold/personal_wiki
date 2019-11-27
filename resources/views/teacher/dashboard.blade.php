@extends('layouts.app')
@section('title')
Teacher - Your guides
@endsection
@section('content')
@include('partials.welcome',['header' => 'Welcome to your teacher dashboard','underHeading' => 'All guides and courses
that you have made at one place.'])
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            questios
        </div>
        <div class="col-lg-3">
            @include('teacher.partials.sidebar')
        </div>
    </div>
</div>
@endsection

<style>
    thead tr td {
        border-top: none !important;
    }
</style>