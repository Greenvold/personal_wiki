<?php

namespace App\Http\Controllers;

use App\Guide;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function dashboard()
    {
        return view('teacher.dashboard', [
            'guides' => Guide::teacherGuides()
        ]);
    }
}