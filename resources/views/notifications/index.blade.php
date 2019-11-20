@extends('layouts.app')
@section('title')
Guide preview
@endsection
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    Notifications
                </div>
                <div class="card-body">
                    <ul class="list-item-group px-0">
                        @forelse ($notifications as $notification)
                        <li class="list-group-item">
                            <div class="d-flex">

                                @if ($notification->type === 'App\Notifications\NewEnrolment')
                                <div class="flex-fill">
                                    You have a new student for course
                                    <strong>{{$notification->data['guide']['title']}}</strong>
                                </div>

                                <div class="">
                                    <button class="btn btn-sm btn-success">Thanks</button>
                                </div>

                                @endif

                                @if ($notification->type === 'App\Notifications\NewLike')
                                <div class="flex-fill">
                                    {{$notification->notifiable->name}} liked your guide
                                    <strong>{{$notification->data['guide']['title']}}</strong>
                                </div>

                                <div class="">
                                    <button class="btn btn-sm btn-success">Say Thank you</button>
                                </div>

                                @endif

                                @if ($notification->type === 'App\Notifications\NewDislike')
                                <div class="flex-fill">
                                    {{$notification->notifiable->name}} disliked your guide
                                    <strong>{{$notification->data['guide']['title']}}</strong>
                                </div>

                                <div class="">
                                    <button class="btn btn-sm btn-success">Say Fuck you</button>
                                </div>

                                @endif
                            </div>
                        </li>
                        @empty
                        <p>You have now new notifications.</p>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    Older notifications
                </div>
                <div class="card-body">
                    <ul class="list-item-group px-0">
                        @forelse ($readNotifications as $notification)
                        <li class="list-group-item">
                            <div class="d-flex">

                                @if ($notification->type === 'App\Notifications\NewEnrolment')
                                <div class="flex-fill">
                                    You have a new student for course
                                    <strong>{{$notification->data['guide']['title']}}</strong>
                                    <br>
                                    <small>{{$notification->created_at}}</small>
                                </div>
                                @endif

                                @if ($notification->type === 'App\Notifications\NewLike')
                                <div class="flex-fill">
                                    {{$notification->notifiable->name}} liked your guide
                                    <strong>{{$notification->data['guide']['title']}}</strong>
                                    <br>
                                    <small>{{$notification->created_at}}</small>
                                </div>

                                @endif

                                @if ($notification->type === 'App\Notifications\NewDislike')
                                <div class="flex-fill">
                                    {{$notification->notifiable->name}} disliked your guide
                                    <strong>{{$notification->data['guide']['title']}}</strong>
                                    <br>
                                    <small>{{$notification->created_at}}</small>
                                </div>
                                @endif
                            </div>
                        </li>
                        @empty
                        <p>You have now new notifications.</p>
                        @endforelse
                    </ul>
                    <div class="d-flex justify-content-center mt-3">
                        {!! $readNotifications->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection