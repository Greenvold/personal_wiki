<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Asset;
use App\ContactUsMessage;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!auth()->user()) {
            return view('home.index', [
                // 'assets' => Asset::searched()

            ]);
        } else {
            return view('home.index', [
                // 'recents' => User::recents()
            ]);
        }
    }


    public function getStarted()
    {
        return view('home.get_started');
    }

    public function contact()
    {

        return view('home.contact');
    }

    public function faq()
    {
        return view('home.faq');
    }
}