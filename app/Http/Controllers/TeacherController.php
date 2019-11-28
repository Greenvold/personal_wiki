<?php

namespace App\Http\Controllers;

use App\Course;
use App\Guide;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function guides()
    {
        return view('teacher.guides', [
            'guides' => Teacher::guides()->simplePaginate(6)
        ]);
    }

    public function courses()
    {
        return view('teacher.courses', [
            'courses' => Teacher::courses()->simplePaginate(6)
        ]);
    }

    public function dashboard()
    {
        if (isset($_GET['search'])) {

            return view('teacher.search_results', [
                'assets' => Teacher::assets()
            ]);
        } else {
            return view('teacher.dashboard');
        }
    }
}