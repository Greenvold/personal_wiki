@extends('layouts.app')
@section('title')
Naucma - Contact
@endsection
@section('content')
<div class="container animated fadeIn">
    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    Contact us
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="title">Your email address</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="title">Title of the questions</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="message" id="message" cols="30" rows="4"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection