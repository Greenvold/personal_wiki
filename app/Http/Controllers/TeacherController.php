<?php

namespace App\Http\Controllers;

use App\Course;
use App\Guide;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function guides()
    {
        return view('teacher.guides', [
            'guides' => Guide::teacherGuides(),
        ]);
    }

    public function courses()
    {
        return view('teacher.courses', [
            'courses' => Course::teacherCourses()
        ]);
    }

    public function dashboard()
    {
        if (isset($_GET['search'])) {

            $merged = Course::teacherCoursesNoPaginate()->union(Guide::teacherGuidesNoPaginate())->simplePaginate(6);
            // dd($merged);
            return view('teacher.search_results', [
                'assets' => $merged
            ]);
        } else {
            return view('teacher.dashboard');
        }
    }
}