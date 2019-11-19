<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guide;
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
        return view('home.index', [
            'guides' => Guide::searched()
        ]);
    }

    function fetch_data(Request $request)
    {

        if ($request->ajax()) {

            $guides = Guide::with('users')->simplePaginate(4);

            return view('home.pagination_data', compact('guides'))->render();
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