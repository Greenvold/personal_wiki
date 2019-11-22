<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guide;
use App\Recent;
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
                'guides' => Guide::searched()
            ]);
        } else {
            $recentViewed = Guide::whereIn(
                'id',
                Recent::select('recentable_id')->where('user_id', auth()->user()->id)->where('recentable_type', 'App\Guide')->orderBy('updated_at', 'desc')->take(2)->get()
            )->simplePaginate(2);

            return view('home.index', [
                'guides' => Guide::searched(),
                'recents' => $recentViewed
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