<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guide;

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
                'guides' => Guide::myGuidesSearched()
            ]
        );
    }

    public function dashboardTabular()
    {
        return view(
            'member.dashboard_tabular',
            [
                'guides' => Guide::myGuidesSearched()
            ]
        );
    }
}