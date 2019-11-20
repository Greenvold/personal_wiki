<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notifications = auth()->user()->unReadNotifications()->paginate(5);
        $readNotifications = auth()->user()->readNotifications()->simplePaginate(5);
        auth()->user()->unreadNotifications->markAsRead();
        return view('notifications.index', [
            'notifications' => $notifications,
            'readNotifications' => $readNotifications
        ]);
    }
}