<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect(route('home'));
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/fetch_data', 'AssetController@fetch_data');

Route::get('/get-started', 'HomeController@getStarted')->name('home.get-started');

Route::get('/faq', 'HomeController@faq')->name('home.faq');

Route::get('/contact', 'HomeController@contact')->name('home.contact');

Route::get('/contact/send', 'ContactController@send')->name('contact.send');


Route::get('/guide/{guide}/preview', 'GuideController@preview')->name('guide.preview');

Route::get('/course/{course}/preview', 'CourseController@preview')->name('course.preview');

Route::get('/guides-and-courses', 'AssetController@index')->name('asset.index');

Route::get('/error/no-access', 'ErrorController@unauthorized')->name('error.no_access');
//Member zone

Route::middleware(['auth'])->group(function () {

    Route::resource('/guide', 'GuideController');

    Route::post('/guide/{guide}/enroll', 'GuideController@enroll')->name('guide.enroll');

    Route::post('/course/{course}/enroll', 'CourseController@enroll')->name('course.enroll');

    Route::post('/guide/{guide}/like', 'LikeController@likeGuide')->name('guide.like');

    Route::post('/guide/{guide}/dislike', 'LikeController@disLikeGuide')->name('guide.dislike');

    Route::get('/member/dashboard', 'MemberController@dashboard')->name('member.dashboard');

    Route::get('/member/dashboard-tabular', 'MemberController@dashboardTabular')->name('member.dashboard-tabular');

    Route::get('/notifications', 'NotificationController@index')->name('notifications.index');

    Route::get('/video/{fileName}', 'VideoController@getVideo')->name('video');

    Route::get('/course/{course}/contiue-course/{episode}', 'CourseController@continue')->name('course.continue');

    Route::get('/course/{course}/overview', 'CourseController@overview')->name('course.overview');

    Route::get('/course/{course}/start-course', 'CourseController@startCourse')->name('course.start');


    Route::resource('/course', 'CourseController');

    Route::get('/course/{course}/episode/{episode}', 'CourseController@show')->name('course.show');

    Route::resource('/episode', 'EpisodeController');
});


//Teacher zone

Route::middleware(['isTeacher', 'auth'])->group(function () {

    Route::get('/teacher/guides-general', 'TeacherController@guides')->name('teacher.guides-general');

    Route::get('/teacher/dashboard-tabular', 'TeacherController@dashboard')->name('teacher.dashboard-tabular');

    Route::get('/teacher/courses-general', 'TeacherController@courses')->name('teacher.courses-general');

    Route::get('teacher/dashboard', 'TeacherController@dashboard')->name('teacher.dashboard');






    Route::get('/course/{course}/create-episode', 'EpisodeController@create')->name('episode.create');

    Route::post('/course/{course}/store-episode', 'EpisodeController@store')->name('episode.store');
});