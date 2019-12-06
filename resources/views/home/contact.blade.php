@extends('layouts.app')
@section('title')
Naucma - Contact
@endsection
@section('content')
<div class="container animated fadeIn mt-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    Contact us
                </div>
                <div class="card-body">
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
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
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option disabled selected value>Select an option</option>
                                    <option value="Guides">Guides</option>
                                    <option value="Courses">Courses</option>
                                    <option value="Account">My Account</option>
                                    <option value="Teahcer role">Teacher role</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="4" class="form-control"
                                    placeholder="Please insert your message here..."></textarea>
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