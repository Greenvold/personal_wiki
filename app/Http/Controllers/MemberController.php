<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {

        return view(
            'member.dashboard',
            [
                'assets' => auth()->user()->assets
            ]
        );
    }

    public function dashboardTabular()
    {
        return view(
            'member.dashboard_tabular',
            [
                'assets' => User::myAssets()
            ]
        );
    }
}